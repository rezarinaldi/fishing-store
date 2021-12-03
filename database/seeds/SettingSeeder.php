<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
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
                'key' => 'name',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'description',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'address',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'telephone',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'email',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'logo',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'key' => 'favicon',
                'value' => '',
                'created_at' => date("Y-m-d H:i:s")
            )
        );

        DB::table('settings')->insert($data);
    }
}
