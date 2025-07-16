<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        try {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'score' => $this->score,
                'comment' => $this->comment,
                'content_id' => $this->comment_id,
                'created_at' => $this->created_at,
                'images' => $this->getMedia('chapters')->map(function($chapter){
                    return $chapter->getUrl();
                })
            ];
        } catch (\Throwable $th) {
            throw "Error en ContentResource " . $th->getMessage();
        }
    }
}
