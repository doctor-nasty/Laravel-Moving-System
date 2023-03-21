<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        // other attributes
        'email',
        'logo',
    ];

    protected $table = 'company';
    protected $guarded = [];
}
