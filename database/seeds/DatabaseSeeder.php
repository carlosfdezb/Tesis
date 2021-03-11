<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'administrador@admin.com',
            'password' => Hash::make('admin12345'),
            'rol' => '0',
            'rut' => '00000000-0',
        ]);
    }
}
