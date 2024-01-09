<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use EditRecord\Concerns\Translatable;


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    use EditRecord\Concerns\Translatable;
 
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
