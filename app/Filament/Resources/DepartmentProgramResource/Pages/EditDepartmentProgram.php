<?php

namespace App\Filament\Resources\DepartmentProgramResource\Pages;

use App\Filament\Resources\DepartmentProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartmentProgram extends EditRecord
{
    protected static string $resource = DepartmentProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load existing images into the images field
        $data['images'] = array_filter([
            $data['image_1'] ?? null,
            $data['image_2'] ?? null,
            $data['image_3'] ?? null,
        ]);
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
