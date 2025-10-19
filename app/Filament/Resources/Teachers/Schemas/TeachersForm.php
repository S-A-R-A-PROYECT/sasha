<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Enums\RolType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeachersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label("UUID")
                    ->readOnly(),
                TextInput::make('last_login_ip')
                    ->label("Ultimo IP de acceso")
                    ->readOnly(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('grade')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->confirmed()
                    ->required(),
                TextInput::make('password_confirmation')
                    ->revealable()
                    ->password()
                    ->required(),

                TextInput::make('document')
                    ->required()
                    ->numeric(),
                Select::make('type_document')
                    ->label("Tipo de documento")
                    ->options([
                        "cc" => "Cédula de ciudadanía",
                        "ce" => "Cédula de extranjería",
                        "ti" => "Tarjeta de identidad",
                        "pp" => "Pasaporte",
                    ])
                    ->required(),
                Select::make('rol')
                    ->options([
                        'Coordinator' => RolType::Coordinator->value,
                        'Teacher' => RolType::Teacher->value,
                    ])
                    ->required(),

            ]);
    }
}
