<?php

namespace Database\Seeders;

use App\Models\carshp;
use App\Models\Company;
use App\Models\inst;
use App\Models\intl;
use App\Models\strg;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => Str::random(10),
            'website' => Str::random(10),
            'address' => Str::random(10),
            'city' => Str::random(10),
            'state' => Str::random(10),
            'zip' => Str::random(10),
            'phonenumber' => rand(1, 100),
            'description' => Str::random(10),
            'usdot' => rand(1, 100),
            'mcno' => rand(1, 100),
            'intrastate' => rand(1, 100),
            'fleetsize' => rand(1, 100),
            'email' => Str::random(10).'@gmail.com'
        ]);
        inst::create([
            'inst_fnm' => Str::random(10),
            'inst_lnm' => Str::random(10),
            'inst_tel' => rand(1, 100),
            'inst_email' => Str::random(10).'@gmail.com',
            'inst_fr_zip' => rand(1, 100),
            'inst_to_zip' => rand(1, 100),
            'inst_sz_id' => rand(1, 100)
        ]);
        intl::create([
            'intl_fnm' => Str::random(10),
            'intl_lnm' => Str::random(10),
            'intl_tel' => rand(1, 100),
            'intl_email' => Str::random(10).'@gmail.com',
            'intl_sz_id' => rand(1, 100)
        ]);
        carshp::create([
            'carshp_fnm' => Str::random(10),
            'carshp_lnm' => Str::random(10),
            'carshp_tel' => rand(1, 100),
            'carshp_email' => Str::random(10).'@gmail.com'
        ]);
        strg::create([
            'strg_fnm' => Str::random(10),
            'strg_lnm' => Str::random(10),
            'strg_tel' => rand(1, 100),
            'strg_email' => Str::random(10).'@gmail.com',
            'strg_sz_id' => rand(1, 100)
        ]);
    }
}
