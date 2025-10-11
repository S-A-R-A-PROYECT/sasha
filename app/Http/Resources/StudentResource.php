<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "name" => $this->name,
            "last_name" => $this->last_name,
            "grade" => $this->grade,
            "email" => $this->email,
            "document" => $this->document,
            "uuid" => $this->uuid,
            "fingerprint" => $this->fingerprint,
            "document_type" => $this->document_type,
            "link_qr_code" => asset(config('filesystems.disks.qr-student.url') . "/" . $this->uuid . '.png') ?? null,
            "last_login_ip" => $this->last_login_ip,
            "last_login_at" => $this->last_login_at,
            'type' => 'student',
        ];
    }
}
