<?php

use App\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate(); // kosongkan table

        $key = '35d76cc2082051fe822726a638c3a374'; // Buat akun atau pakai API akun yang sudah dibuat
        $province_url = 'https://api.rajaongkir.com/starter/province';

        // logic untuk get province
        $getProvinces = $this->getData($key, $province_url);
        $provinces = $getProvinces['rajaongkir']['results'];

        foreach ($provinces as $province) {
            $data[] = [
                'id' => $province['province_id'],
                'province' => $province['province'],
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        Province::insert($data);
    }

    // function untuk get data province
    private function getData($key, $url)
    {
        return Http::withHeaders([
            'key' => $key
        ])->get($url);
    }
}
