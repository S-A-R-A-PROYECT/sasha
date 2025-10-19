<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentsResource;
use App\Imports\StudentsImport;
use App\Models\Student;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

use function Spatie\LaravelPdf\Support\pdf;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('importExcel')
                ->label("Importar estudiantes")
                ->icon('heroicon-o-arrow-up-tray')
                ->schema([
                    FileUpload::make('file')
                        ->label('Archivo Excel')
                        ->disk('public')
                        ->required()
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']),
                ])
                ->action(function (array $data) {
                    // Lógica para importar estudiantes desde un archivo Excel
                    $filePath = Storage::disk('public')->path($data['file']);

                    if (!Storage::disk('public')->exists($data['file'])) {
                        Notification::make()
                            ->title('El archivo no existe.')
                            ->danger()
                            ->send();
                        return;
                    }
                    DB::beginTransaction();

                    try {
                        ini_set('max_execution_time', 300); // 300 segundos = 5 minutos
                        set_time_limit(300);
                        Hash::setRounds(4);

                        Excel::import(new StudentsImport, $filePath);

                        $credentials = StudentsImport::$credentials;

                        $fileName = 'credenciales_estudiantes_' . Carbon::now()->format('Ymd_His') . '.pdf';

                        // Generar el PDF con las credenciales
                        Pdf::view('pdf.credentials', ['credentials' => $credentials])
                            ->disk('public')
                            ->withBrowsershot(function (Browsershot $browsershot) {
                                $browsershot->noSandbox();
                            })
                            ->save($fileName);


                        DB::commit();

                        Notification::make()
                            ->title('Importación completada correctamente.')
                            ->body('Puedes descargar el PDF con las credenciales haciendo clic abajo.')
                            ->success()
                            ->actions([
                                Action::make('download')
                                    ->label('Descargar PDF')
                                    ->url(Storage::url($fileName))
                                    ->openUrlInNewTab(),
                            ])
                            ->send();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error('Error durante la importación: ' . $e->getMessage());

                        Notification::make()
                            ->title('Error durante la importación: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                })
        ];
    }
}
