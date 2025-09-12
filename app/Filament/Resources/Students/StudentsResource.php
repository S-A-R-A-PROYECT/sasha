<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\Pages\CreateStudents;
use App\Filament\Resources\Students\Pages\EditStudents;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Schemas\StudentsForm;
use App\Filament\Resources\Students\Tables\StudentsTable;
use App\Models\Student;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StudentsResource extends Resource
{
    protected static ?string $model = Student::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::Bolt;

    protected static string | UnitEnum | null $navigationGroup = 'Database';

    protected static ?string $recordTitleAttribute = 'Students';

    public static function form(Schema $schema): Schema
    {
        return StudentsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudents::route('/'),
            'create' => CreateStudents::route('/create'),
            'edit' => EditStudents::route('/{record}/edit'),
        ];
    }
}
