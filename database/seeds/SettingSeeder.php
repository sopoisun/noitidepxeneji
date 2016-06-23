<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'web_name'  => 'Ijen Expedition',
            'address'   => 'Jl. Kawah ijen licin no 17',
            'phone'     => '0852587900099',
        ]);
    }
}
