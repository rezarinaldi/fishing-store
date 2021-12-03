<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123456'),
                'role' => 'admin',
                'gender' => 'male',
                'created_at' => date("Y-m-d H:i:s")

            ),
            array(
                'name' => 'Bella',
                'email' => 'bella@gmail.com',
                'password' => Hash::make('bella123456'),
                'role' => 'user',
                'gender' => 'female',
                'created_at' => date("Y-m-d H:i:s")
            ),
        );

        DB::table('users')->insert($data);
    }
}
