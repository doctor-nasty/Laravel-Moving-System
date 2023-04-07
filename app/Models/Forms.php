<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;
    protected $table = 'forms';


    protected $fillable = [
        'firstname', 'lastname', 'email', 'phonenumber', 'movingfromzip1', 'movingtozip1', 'movingdate1',
         'movesize1', 'type1', 'movingfromzip2', 'movingtocountry2', 'movingtocontinent2', 'movingdate2',
          'movesize2', 'type2',	'movingfromzip3', 'movingtozip3', 'carmake3', 'carmodel3', 'caryear3',
           'movingdate3', 'type3', 'movingfromzip4', 'movingtozip4', 'movesize4', 'movingdate4',
           'type4', 'cityto1', 'cityto3', 'cityto4', 'cityfrom1', 'cityfrom2', 'cityfrom3', 'cityfrom4', 'token', 'pin'
                          ];
}
