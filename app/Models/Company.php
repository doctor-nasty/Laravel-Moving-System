<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'website', 'address', 'city', 'state', 'zip', 'phonenumber',
        'description', 'usdot', 'mcno', 'logo', 'intrastate', 'fleetsize',
        'email', 'status'
    ];


    protected $table = 'company';
    protected $guarded = [];
}
