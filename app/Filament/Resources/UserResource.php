<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use App\Traits\Filament\HasTranslationLabel;
use Filament\Resources\Concerns\Translatable;

class UserResource extends Resource
{
    // use HasTranslationLabel;
    // use Translatable;
    use Translatable;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    public static function getNavigationLabel (): string {
        return __('form.user'); 
      }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label(__('form.name')),
                TextInput::make('email')->email()->required()->unique()->label(__('form.email')),
                TextInput::make('password')->password()->required()->label(__('form.password'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->searchable()->label(__('form.name')),
                TextColumn::make('email')->label(__('form.email'))

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // public static function getModelLabel () :string {
    //     // dd(445);
    //     return __('form.user');
    // }

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }

    public static function getPluraModelLabel (): string {
        return __('form.user');
    }

    public static function getGloballySearchableAttributes(): array
{
    return ['name'];
}
}
