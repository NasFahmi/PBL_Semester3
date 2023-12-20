<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "nama" => "admin",
            "email" => "pawonkoeAdmin@gmail.com",
            "password" => Hash::make('admin'),
            "link_toko" => "tidak punya",
            "link_wa" => "tidak punya",
            "link_ig" => "tidak punya",
            "alamat" => "sempu"
        ]);
        $admin->assignRole('admin');

        $owner = User::create([
            "nama" => "pawonkoe",
            "email" => "pawonkoe@gmail.com",
            "password" => Hash::make('pawonkoe'),
            "link_toko" => "ini toko",
            "link_wa" => "ini wa",
            "link_ig" => "ini ig",
            "alamat" => "sempu"
        ]);
        $owner->assignRole('superadmin');
    }
}
