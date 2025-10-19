<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeachersResource;
use App\Models\Teacher;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CreateTeachers extends CreateRecord
{
    protected static string $resource = TeachersResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $teacher = Teacher::create([
            'uuid' => Str::uuid(),
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'grade' => $data['grade'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'document' => $data['document'],
            'document_type' => $data['type_document'],
            'rol' => $data['rol'],
        ]);

        return $teacher;
    }
}
