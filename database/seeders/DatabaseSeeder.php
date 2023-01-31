<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\inst;
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
    }
}
