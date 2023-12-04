<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'nama_product'=>'Product A',
                'harga_rendah'=> '10000',
                'harga_tinggi'=>'20000',
                'deskripsi'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit eos ab voluptatem eaque animi. Neque nihil repudiandae officia vero sed!',
                'link_shopee'=> 'link',
                'stok'=> '40',
                'spesifikasi_product'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit eos ab voluptatem eaque animi. Neque nihil repudiandae officia vero sed!',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

            ]
        ]);
    }
}
