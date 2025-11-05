<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label("UUID")
                    ->readOnly(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->unique(table: User::class),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->confirmed(),
                TextInput::make('password_confirmation')
                    ->revealable()
                    ->password(),
                TextInput::make('fingerprint')
                    ->readOnly(),
                TextInput::make('document')
                    ->label('Document')
                    ->required(),
                Select::make('type_document')
                    ->label("Tipo de documento")
                    ->options([
                        "cc" => "Cédula de ciudadanía",
                        "ce" => "Cédula de extranjería",
                        "ti" => "Tarjeta de identidad",
                        "pp" => "Pasaporte",
                    ])
                    ->required(),
                TextInput::make('last_login_ip')
                    ->readOnly(),
                DateTimePicker::make('last_login_at'),
                FileUpload::make('profile_photo_path')
                    ->disk('profile_photo')
                    ->label('Profile Photo')
                    ->imageEditor()
                    ->avatar()
            ]);
    }
}
