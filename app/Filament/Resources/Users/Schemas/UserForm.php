<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
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
                TextInput::make('last_login_ip')
                    ->readOnly(),
                DateTimePicker::make('last_login_at'),
                FileUpload::make('profile_photo_path')
                    ->disk('profile_photo')
                    ->label('Profile Photo')
                    ->avatar()
            ]);
    }
}
