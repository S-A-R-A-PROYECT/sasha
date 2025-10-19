<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;



use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

class BarcodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sasha:barcodes {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will create all barcodes for students, teachers and developers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type');

        switch ($type) {
            case 'student':
                $this->generateQrCodes(Student::all(), 'qr-student');
                break;
            case 'teacher':
                $this->generateQrCodes(Teacher::all(), 'qr-teacher');
                break;
            case 'developer':
                $this->generateQrCodes(User::all(), 'qr-developer');
                break;
            default:
                $this->generateQrCodes(Student::all(), 'qr-student');
                break;
        }
    }

    function generateQrCodes($model, $disk)
    {
        $students = $model;
        $disk = Storage::disk($disk);
        $count = 0;

        foreach ($students as $student) {
            $writer = new PngWriter();

            $qrCode = new QrCode(
                data: $student->uuid,
                encoding: new Encoding('UTF-8'),
            );

            $logo = new Logo(
                path: public_path() . '\imgs\2-bg.png',
                resizeToWidth: 100,
            );

            $label = new Label(
                text: $student->name,
                textColor: new Color(0, 0, 0)
            );

            $result = $writer->write($qrCode, $logo, $label);
            $filename = $student->uuid . '.png';
            $disk->put($filename, $result->getString());
            $count++;
        }
        $this->info("✅ Se han creado {$count} códigos QR.");
    }
}
