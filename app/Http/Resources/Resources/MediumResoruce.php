<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediumResoruce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "score" => $this->score,
            "comment" => $this->comment,
            "category" => $this->category->category,
            "status" => $this->status->status,
            "user_id" => $this->user_id,
            "pending_priority" => $this->pendingPriority->priority ?? null,
            "post_view_priority" => $this->postViewPriority->priority ?? null,
            "imageUrl" => $this->getMedia('medias')->first()->getUrl(),
            "creation_date" => $this->created_at
        ];
    }
}
