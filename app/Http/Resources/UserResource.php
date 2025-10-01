<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
            'email' => $this->email,
            "grade" => $this->grade,
            "fingerprint" => $this->fingerprint,
            "document" => $this->document,
            "document_type" => $this->document_type,
            "last_login_ip" => $this->last_login_ip,
            "last_login_at" => $this->last_login_at,
            'type' => $this->type ?? 'student',
        ];
    }
}
