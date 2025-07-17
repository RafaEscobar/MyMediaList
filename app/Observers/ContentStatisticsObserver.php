<?php

namespace App\Observers;

use App\Models\Content;
use App\Models\User;

class ContentStatisticsObserver
{
    /**
     * Handle the Content "created" event.
     */
    public function created(Content $content): void
    {
        $this->recomputeStats($content->user_id);
    }

    /**
     * Handle the Content "updated" event.
     */
    public function updated(Content $content): void
    {
        if ($content->isDirty(['status', 'isFavorite', 'category_id', 'created_at'])) {
            $this->recomputeStats($content->user_id);
        }
    }

    /**
     * Handle the Content "deleted" event.
     */
    public function deleted(Content $content): void
    {
        $this->recomputeStats($content->user_id);
    }

    /**
     * Handle the Content "restored" event.
     */
    public function restored(Content $content): void
    {
        //
    }

    /**
     * Handle the Content "force deleted" event.
     */
    public function forceDeleted(Content $content): void
    {
        //
    }

    protected function recomputeStats($userId)
    {
        $user = User::find($userId);

        // Conteos
        $pendings  = $user->contents()->where('status',0)->count();
        $favorites = $user->contents()->where('isFavorite',1)->count();
        $declined  = $user->contents()->where('status',2)->count();

        // Top categoría
        $topCat = $user->contents()
            ->select('category_id', \DB::raw('COUNT(*) as total'))
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();

        // Top día
        $topDay = $user->contents()
            ->select(\DB::raw('DAYNAME(created_at) as day'), \DB::raw('COUNT(*) as total'))
            ->groupBy('day')
            ->orderByDesc('total')
            ->first();

        // Actualiza o crea el registro de stats
        $user->stats()->updateOrCreate([], [
            'pendings'      => $pendings,
            'favorites'     => $favorites,
            'declined'      => $declined,
            'top_category_id'     => $topCat?->category_id,
            'top_day'        => $topDay?->day,
        ]);
    }
}
