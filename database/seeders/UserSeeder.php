<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Hussein Sonbol',
            'email' => 'sehssonbol2016@gmail.com',
            'phone' => '01003795292',
            'password' => Hash::make('sonbol@123'),
        ]);
    }
}
