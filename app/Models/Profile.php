<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'image',
        'whatsapp_number',
    ];

    public static function getByKey(string $key)
    {
        return static::where('key', $key)->first();
    }
}
