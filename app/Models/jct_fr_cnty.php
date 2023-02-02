<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jct_fr_cnty extends Model
{
    use HasFactory;
    protected $table = 'jct_fr_cnty';
    protected $guarded = [];

    public function zipcodes()
    {
      return $this->belongsTo(Zip::class);
    }

}
