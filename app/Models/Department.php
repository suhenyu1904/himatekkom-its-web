<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'vision',
        'mission',
        'image',
        'icon',
        'instagram',
        'twitter',
        'facebook',
        'youtube',
        'linkedin',
        'tiktok',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($department) {
            if (empty($department->slug)) {
                $department->slug = Str::slug($department->name);
            }
        });
    }

    public function programs(): HasMany
    {
        return $this->hasMany(DepartmentProgram::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(OrganizationStructure::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
