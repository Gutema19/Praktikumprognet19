<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('admin12345678'),
            'name' => 'Admin',
            'profile_image' => '',
            'phone' => '08999999999',
        ]);
    }
}