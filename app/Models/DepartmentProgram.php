<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'image',
        'image_1',
        'image_2',
        'image_3',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Accessor untuk mendapatkan semua gambar sebagai array
    public function getImagesAttribute()
    {
        return json_decode($this->attributes['images'] ?? '[]', true);
    }

    // Mutator untuk menyimpan gambar sebagai JSON
    public function setImagesAttribute($value)
    {
        if (is_array($value)) {
            // Set image fields berdasarkan array
            $this->attributes['image'] = $value[0] ?? null;
            $this->attributes['image_1'] = $value[0] ?? null;
            $this->attributes['image_2'] = $value[1] ?? null;
            $this->attributes['image_3'] = $value[2] ?? null;
        }
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // Getter untuk mendapatkan array gambar dari field individual
    public function getAllImagesAttribute()
    {
        return array_filter([
            $this->image_1,
            $this->image_2,
            $this->image_3,
        ]);
    }
}
