<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Aplication Name'),
                TextColumn::make('id')->label('Client ID')
                    ->searchable()
                    ->formatStateUsing(fn($state) => substr($state, 0, 9) . str_repeat('*', max(strlen($state) - 9, 0)))
                    ->copyable()
                    ->copyableState(fn($state) => $state)
                    ->copyMessage('Secreto copiado al portapapeles')
                    ->copyMessageDuration(2000),
                TextColumn::make('secret')->formatStateUsing(fn() => '*****************'),
                TextColumn::make('user.name')->label('Owner by')->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
