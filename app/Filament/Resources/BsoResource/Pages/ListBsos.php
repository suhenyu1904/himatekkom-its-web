<?php

namespace App\Filament\Resources\BsoResource\Pages;

use App\Filament\Resources\BsoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBsos extends ListRecords
{
    protected static string $resource = BsoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
