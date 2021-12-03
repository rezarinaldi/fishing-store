<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
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
                'value' => ''

            ),
            array(
                'key' => 'description',
                'value' => ''
            ),
            array(
                'key' => 'address',
                'value' => ''
            ),
            array(
                'key' => 'telphone',
                'value' => ''
            ),
            array(
                'key' => 'email',
                'value' => ''
            ),
            array(
                'key' => 'logo',
                'value' => ''
            ),
            array(
                'key' => 'favicon',
                'value' => ''
            )
        );

        DB::table('settings')->insert($data);
    }
}
