<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'family_name',
        'name',
        'gender',
        'email',
        'postal',
        'address',
        'building',
        'opinion',
    ];
}
