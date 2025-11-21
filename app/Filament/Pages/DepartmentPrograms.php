<?php

namespace App\Filament\Pages;

use App\Models\Department;
use Filament\Pages\Page;

class DepartmentPrograms extends Page
{
    protected static string $view = 'filament.pages.department-programs';
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    public static function getNavigationGroup(): ?string
    {
        return static::$navigationGroup ?? 'Departemen';
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        return false; // We'll register these dynamically
    }
}
