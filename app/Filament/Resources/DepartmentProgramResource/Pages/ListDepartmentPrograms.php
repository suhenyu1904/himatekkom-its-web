<?php

namespace App\Filament\Resources\DepartmentProgramResource\Pages;

use App\Filament\Resources\DepartmentProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentPrograms extends ListRecords
{
    protected static string $resource = DepartmentProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
