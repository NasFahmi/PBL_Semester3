<?php

namespace Database\Seeders;

use App\Models\Foto;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Foto::insert([
            [
                'foto'=>'rambak.jpg',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'foto'=>'crispy savour.jpg',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'foto'=>'sambel.jpg',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'foto'=>'squidy_crackers.jpg',
                'product_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
