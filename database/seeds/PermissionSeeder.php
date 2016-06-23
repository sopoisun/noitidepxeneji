<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permission::insert([
            // Setting
            [
                'name'  => 'Ubah Setting',
                'key'   => 'setting.update',
            ],
            // User
            [
                'name'  => 'Tambah User',
                'key'   => 'user.create',
            ],
            [
                'name'  => 'Lihat User',
                'key'   => 'user.read',
            ],
            [
                'name'  => 'Ubah User',
                'key'   => 'user.update',
            ],
            [
                'name'  => 'Hapus User',
                'key'   => 'user.delete',
            ],
            // Karyawan
            [
                'name'  => 'Tambah Karyawan',
                'key'   => 'karyawan.create',
            ],
            [
                'name'  => 'Lihat Karyawan',
                'key'   => 'karyawan.read',
            ],
            [
                'name'  => 'Ubah Karyawan',
                'key'   => 'karyawan.update',
            ],
            [
                'name'  => 'Hapus Karyawan',
                'key'   => 'karyawan.delete',
            ],
            // Role
            [
                'name'  => 'Tambah Role',
                'key'   => 'role.create',
            ],
            [
                'name'  => 'Lihat Role',
                'key'   => 'role.read',
            ],
            [
                'name'  => 'Ubah Role',
                'key'   => 'role.update',
            ],
            [
                'name'  => 'Hapus Role',
                'key'   => 'role.delete',
            ],
            // Permission
            [
                'name'  => 'Tambah Permission',
                'key'   => 'permission.create',
            ],
            [
                'name'  => 'Lihat Permission',
                'key'   => 'permission.read',
            ],
            [
                'name'  => 'Ubah Permission',
                'key'   => 'permission.update',
            ],
            [
                'name'  => 'Hapus Permission',
                'key'   => 'permission.delete',
            ],
        ]);
    }
}
