<?php

namespace App\Filament\Resources\BsoResource\Pages;

use App\Filament\Resources\BsoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBso extends EditRecord
{
    protected static string $resource = BsoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
