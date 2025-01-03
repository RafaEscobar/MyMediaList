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
            "category_id" => $this->category_id,
            "status_id" => $this->status_id,
            "user_id" => $this->user_id,
            "priority_id" => $this->priority_id,
            "imageUrl" => $this->getMedia('medias')->first()->getUrl()
        ];
    }
}
