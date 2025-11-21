<?php

namespace App\Filament\Resources\DepartmentProgramResource\Pages;

use App\Filament\Resources\DepartmentProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDepartmentProgram extends CreateRecord
{
    protected static string $resource = DepartmentProgramResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Handle multiple images upload
        if (isset($data['images']) && is_array($data['images'])) {
            $data['image'] = $data['images'][0] ?? null;
            $data['image_1'] = $data['images'][0] ?? null;
            $data['image_2'] = $data['images'][1] ?? null;
            $data['image_3'] = $data['images'][2] ?? null;
            unset($data['images']);
        }
        
        return $data;
    }
}
