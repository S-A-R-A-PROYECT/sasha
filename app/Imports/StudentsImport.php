<?php

namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{

    public static $credentials = [];

    public function model(array $row)
    {
        $passwordPlain = strtolower(str_replace(' ', '', $row["nombres"])) . random_int(100, 999);

        // Guardar credenciales para luego generar PDF
        self::$credentials[] = [
            'name'       => $row['nombres'],
            'last_name'  => $row['apellidos'],
            'grade'      => $row['gradosolicitado'],
            'document'   => $row['identificacion'],
            'email'      => $row['email'],
            'password'   => $passwordPlain,
        ];


        return new Student([
            'type_document' => $row["tipoid"],
            'document' => $row["identificacion"],
            'grade' => $row["gradosolicitado"],
            'journey' => $row["jornadaactual"],
            'birthday' => Carbon::instance(Date::excelToDateTimeObject($row["fechanacimiento"])),
            'name' => $row["nombres"],
            'last_name' => $row["apellidos"],
            'rh' => $row["rh"],
            'locality' => $row["localidad"],
            'phone' => $row["telefono"],
            'email' => $row["email"],
            'password' => Hash::make($passwordPlain),
            'fingerprint' => null,
            'uuid' => Str::uuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function batchSize(): int
    {
        return 500;
    }
    public function chunkSize(): int
    {
        return 500;
    }
}
