<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;


class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Branch';

   public static function getNavigationLabel (): string {
     return __('form.branch');
   }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label( __('form.branch_name'))->required(),

                Select::make('city_id')->relationship('city', 'name')
                      ->searchable()
                      ->preload()
                      ->required()
                      ->label(__('form.city')),

                Map::make("adddress")
                      ->label(__("form.address"))
                    //   ->autocomplete("name")
                      ->defaultLocation([24.7136, 46.6753])
                      ->defaultZoom(12)
                      ->draggable()
                      ->clickable()
                      ->columnSpan(2)
                      ->required()
                      ->geolocate(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label(__('form.branch')),
                TextColumn::make('city.name')->label(__('form.city')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            RelationManagers\ProductRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'view' => Pages\ViewBranch::route('/{record}'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel () :string {
        return __('form.branch');
    }

    public static function getPluraModelLabel (): string {
        return __('form.branch');
    }
}
