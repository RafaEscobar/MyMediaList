<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $includeToken;

    public function __construct($resource, $token = null) 
    {
        parent:: __construct($resource);
        $this->includeToken = $token;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            "name" => $this->name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "date_birth" => $this->date_birth,
            "token"
        ];
        if ($this->includeToken) $data['token'] = $this->includeToken;
        return $data;
    }
}
