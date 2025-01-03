<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SagaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'num_caps' => $this->num_caps,
            'season' => $this->season,
            'final_comment' => $this->final_comment,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id
        ];
    }
}
