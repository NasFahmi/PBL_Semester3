<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            "nama" => "admin",
            "email" => "pawonkoe@gmail.com",
            "password" => Hash::make('admin'),
            "link_toko" => "disana",
            "link_wa" => "disini",
            "link_ig" => "disani",
            "alamat" => "sempu"
        ]);
    }
}
