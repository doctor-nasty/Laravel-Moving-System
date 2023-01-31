<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zip extends Model
{
    use HasFactory;

    protected $connection = 'mysql_2';
    protected $table = 'zipcode_zipcode';

}
