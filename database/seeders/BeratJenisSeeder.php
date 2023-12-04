<?php

namespace Database\Seeders;

use App\Models\BeratJenis;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeratJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BeratJenis::insert([
            [
                'berat_jenis'=>'Kecil',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'berat_jenis'=>'Sedang',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'berat_jenis'=>'Besar',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
