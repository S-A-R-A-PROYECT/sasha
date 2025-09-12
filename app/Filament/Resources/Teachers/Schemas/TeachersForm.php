<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeachersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('grade')
                    ->required()
                    ->numeric(),
                TextInput::make('pasword')
                    ->required(),
                TextInput::make('document')
                    ->required()
                    ->numeric(),
                TextInput::make('document_type')
                    ->required(),
                TextInput::make('rol')
                    ->required(),
            ]);
    }
}
