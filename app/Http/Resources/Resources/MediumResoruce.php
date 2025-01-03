<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediumResoruce extends JsonResource
{
    protected $urlImage;

    public function __construct($resource, $image = null)
    {
        parent:: __construct($resource);
        $this->urlImage = $image;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            "id" => $this->id,
            "title" => $this->title,
            "score" => $this->score,
            "comment" => $this->comment,
            "category_id" => $this->category_id,
            "status_id" => $this->status_id,
            "user_id" => $this->user_id,
            "priority_id" => $this->priority_id
        ];
        if ($this->urlImage) $data['image'] = $this->urlImage;
        return $data;
    }
}
