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
        try {
            $data = [
                'id' => $this->id,
                'title' => $this->title,
                'num_caps' => (int)$this->num_caps,
                'season' => (int)$this->season,
                'final_comment' => $this->final_comment,
                'category' => [
                    'id' => $this->category->id,
                    'category' => $this->category->category
                ],
                'type' => [
                    'id' => $this->category->subtype->id,
                    'type' => $this->category->subtype->subtype
                ],
                'status' => $this->status->status,
                "pending_priority" => $this->pendingPriority->priority ?? null,
                "post_view_priority" => $this->postViewPriority->priority ?? null,
                'images' => $this->getMedia('sagas')->map(fn($image) => $image->getUrl()),
                'creation_date' => $this->created_at,
                'score' => $this->score
            ];
            if ($this->position) $data['position'] = $this->position;
            return $data;
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }
}
