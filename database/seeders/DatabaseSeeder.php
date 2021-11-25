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
            'password'  => Hash::make('webmaster.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Jose Alberto Avalos Villaseñor',
            'slug'      =>  Str::slug('Jose Alberto Avalos Villaseñor'),
            'email'     => 'gerencia@pyscom.com',
            'password'  => Hash::make('gerencia.pyscom.2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Martha Mireya Paniagua Sánchez',
            'slug'      =>  Str::slug('Martha Mireya Paniagua Sánchez'),
            'email'     => 'administracion@pyscom.com',
            'password'  => Hash::make('administracion.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Catarina Alcocer Olivares',
            'slug'      =>  Str::slug('Catarina Alcocer Olivares'),
            'email'     => 'ventas@pyscom.com',
            'password'  => Hash::make('ventas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Ana Manuela Bautista Cruz',
            'slug'      =>  Str::slug('Ana Manuela Bautista Cruz'),
            'email'     => 'pyscom@live.com.mx',
            'password'  => Hash::make('ana.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'María de Lourdes Díaz Villagómez',
            'slug'      =>  Str::slug('María de Lourdes Díaz Villagómez'),
            'email'     => 'ventasvirrey@pyscom.com',
            'password'  => Hash::make('ventas.virrey.pyscom.2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Yareli Rojas Ferreyra',
            'slug'      =>  Str::slug('Yareli Rojas Ferreyra'),
            'email'     => 'ventas1@pyscom.com',
            'password'  => Hash::make('ventas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Jessica Hernandez Pille',
            'slug'      =>  Str::slug('Jessica Hernandez Pille'),
            'email'     => 'adminvirrey@pyscom.com',
            'password'  => Hash::make('adminvirrey.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'María Monica Aavalos Villaseñor',
            'slug'      =>  Str::slug('María Monica Aavalos Villaseñor'),
            'email'     => 'gerenciavirrey@pyscom.com',
            'password'  => Hash::make('gerenciavirrey.pyscom2021'),
        ]);


    }
}
