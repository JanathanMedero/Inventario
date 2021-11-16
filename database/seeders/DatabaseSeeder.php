<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        DB::table('roles')->insert([
            'role' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'role' => 'Empleado',
        ]);
        
        DB::table('users')->insert([
            'role_id'   => 1,
            'name'      => 'Janathan Medero Pineda',
            'slug'      =>  Str::slug('Janathan Medero Pineda'),
            'email'     => 'webmaster@pyscom.com',
            'password'  => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Jose Alberto Avalos Villaseñor',
            'slug'      =>  Str::slug('Jose Alberto Avalos Villaseñor'),
            'email'     => 'test@pyscom.com',
            'password'  => Hash::make('admin'),
        ]);
    }
}
