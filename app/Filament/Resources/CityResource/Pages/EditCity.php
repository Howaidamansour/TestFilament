<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCity extends EditRecord
{
    protected static string $resource = CityResource::class;
    use EditRecord\Concerns\Translatable;
 
  
  
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

            Actions\DeleteAction::make(),
        ];
    }
}
