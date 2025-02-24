<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SagaResource extends JsonResource
{
    protected $position;

    public function __construct($resorce, $position = null)
    {
        parent:: __construct($resorce);
        $this->position = $position;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'num_caps' => (int)$this->num_caps,
            'season' => (int)$this->season,
            'final_comment' => $this->final_comment,
            'category' => $this->category->category,
            'status' => $this->status->status,
            "pending_priority" => $this->pendingPriority->priority ?? null,
            "post_view_priority" => $this->postViewPriority->priority ?? null,
            'imageUrl' => $this->getMedia('sagas')->first()->getUrl(),
            'creation_date' => $this->created_at
        ];
        if ($this->position) $data['position'] = $this->position;
        return $data;
    }
}
