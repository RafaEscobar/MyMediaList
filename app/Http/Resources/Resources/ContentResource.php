<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
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
                "id" => $this->id,
                'name' => $this->name,
                'score' => $this->score,
                'comment' => $this->comment,
                'status' => $this->status,
                'isFavorite' => $this->isFavorite,
                'category_id' => $this->category_id,
                'user_id' => $this->user_id,
                'cover' => $this->getFirstMediaUrl('cover'),
                'images' => $this->getMedia('contents')->map(fn($media) => $media->getUrl()),
                "chapters" => ChapterResource::collection($this->whenLoaded('chapters')),
                'created_at' => $this->created_at
            ];
        } catch (\Throwable $th) {
            throw "Content resource error: " . $th->getMessage();
        }
    }
}
