<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid" => $this->uuid,
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            "document" => $this->document,
            "document_type" => $this->document_type,
            "fingerprint" => $this->fingerprint,
            "last_login_ip" => $this->last_login_ip,
            "last_login_at" => $this->last_login_at,
            'type' => 'developer',
        ];
    }
}
