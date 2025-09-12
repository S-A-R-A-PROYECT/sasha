<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('grade')
                    ->required()
                    ->numeric(),
                TextInput::make('fingerprint')
                    ->required(),
                TextInput::make('UUID')
                    ->required(),
                TextInput::make('document')
                    ->required()
                    ->numeric(),
                TextInput::make('document_type')
                    ->required(),
            ]);
    }
}
