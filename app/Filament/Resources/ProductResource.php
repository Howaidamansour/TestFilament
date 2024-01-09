<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Traits\Filament\HasTranslationLabel;
use Filament\Resources\Concerns\Translatable;
class ProductResource extends Resource
{
    use Translatable;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    


    public static function getNavigationLabel (): string {
        return __('form.product');
      }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->string()->maxLength(255)->label(__('form.name')),
                Textarea::make('description')->label(__('form.description')),
                
                   TextInput::make('price')->required()->numeric()->label(__('form.price')) ,
                TextInput::make('quantity')->required()->integer()->label(__('form.quantity')),
                Select::make('category_id')->relationship('category', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->required()->label(__('form.category')),
                
                SpatieMediaLibraryFileUpload::make('Image')->collection('images')->label(__('form.image')),
                SpatieMediaLibraryFileUpload::make('Additional Images')->multiple()->collection('additinal images')->label(__('form.additional_images')),


                // FileUpload::make('images')->image()
                //         // ->cloumns(1)
                //         ->multiple()
                //         ->directory('additional_images')
                //         ->enableReordering()
                //         ->enableDownload()
                //         ->storeFileNamesIn('images_name')
                //         ->label(__('form.additional_images'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label(__('form.name')),
                TextColumn::make('price')->label(__('form.price')),
                TextColumn::make('quantity')->label(__('form.quantity')),
                // ImageColumn::make('image'),
                TextColumn::make('category.name')->label(__('form.category')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            RelationManagers\ImageRelationManager::class,
                ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }


    public static function getModelLabel () :string {
        return __('form.product');
    }

    public static function getPluraModelLabel (): string {
        return __('form.product');
    }

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }
}
