<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'department_id',
        'photo',
        'email',
        'phone',
        'order',
        'level',
        'bio',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
