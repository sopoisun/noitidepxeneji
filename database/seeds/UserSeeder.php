<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'email'     => 'ahmadrizalafani@gmail.com',
            'password'  => bcrypt('administrator'),
            'api_token' => str_random(35),
        ]);

        $karyawan = \App\Karyawan::create([
            'nama'      => 'Ahmad Rizal Afani',
            'no_hp'     => '087755925565',
            'alamat'    => 'Kertosari Banyuwangi',
            'jabatan'   => 'Programmer',
            'user_id'   => $user->id,
        ]);

        $role = \App\Role::create([
            'name'  => 'Super User',
            'key'   => 'superuser',
        ]);

        $user->assignRole($role);
    }
}
