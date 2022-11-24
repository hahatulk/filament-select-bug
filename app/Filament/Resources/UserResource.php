<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use function PHPUnit\Framework\stringContains;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getMockArray(string $search = ''): array
    {
        $mockItems = [
            '1' => 1,
            '2' => 2,
        ];

        return collect($mockItems)->filter(fn($value) => stripos((string)$value, $search) !== false)->toArray();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('test_field')
                    ->searchable()
                    ->options(fn() => self::getMockArray())
                    ->getSearchResultsUsing(function (string $search) {
                        return self::getMockArray($search);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
