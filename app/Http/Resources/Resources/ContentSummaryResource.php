<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentSummaryResource extends JsonResource
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
                'isFavorite' => $this->isFavorite,
                'cover' => $this->getFirstMediaUrl('cover'),
            ];
        } catch (\Throwable $th) {
            dd("aqui");
            throw "Error interno: content-summary";
        }
    }
}
