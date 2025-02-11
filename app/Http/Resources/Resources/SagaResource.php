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
            'num_caps' => $this->num_caps,
            'season' => $this->season,
            'final_comment' => $this->final_comment,
            'score' => $this->score,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
            "pending_priority_id" => $this->pending_priority_id,
            "post_view_priority_id" => $this->post_view_priority_id,
            'imageUrl' => $this->getMedia('sagas')->first()->getUrl()
        ];
        if ($this->position) $data['position'] = $this->position;
        return $data;
    }
}
