<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'whatsapp',
        'address',
    ];
    
    public static function getContactInfo()
    {
        return static::first();
    }
}
