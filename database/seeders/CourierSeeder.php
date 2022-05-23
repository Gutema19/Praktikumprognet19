<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courier::insert([
            [
                'courier' => 'jne',
            ],
            [
                'courier' => 'pos',
            ],
            [
                'courier' => 'tiki',
            ],

        ]);
    }
}