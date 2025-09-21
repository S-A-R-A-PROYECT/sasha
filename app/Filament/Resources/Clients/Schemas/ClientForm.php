<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('id')
                    ->readOnly(),

                ColorPicker::make('dev_color'),
                ColorPicker::make('student_color'),
                ColorPicker::make('teacher_color'),
                Repeater::make('redirect_uris')->schema([
                    TextInput::make('domain')
                        ->url()
                        ->suffixIcon(Heroicon::GlobeAlt),
                ])->mutateDehydratedStateUsing(fn($state) => collect($state)->pluck('domain')->filter()->values()->all())
                    ->dehydrateStateUsing(null) // desactiva la mutación automática inversa
                    ->formatStateUsing(fn($state) => collect($state)->map(fn($uri) => ['domain' => $uri])->toArray()),

                FileUpload::make('logo')
                    ->disk('sso')
                    ->columnSpan(2),

            ]);
    }
}
