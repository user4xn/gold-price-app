<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomValue;
use Illuminate\Hashing\BcryptHasher;
class CustomValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomValue::create([
            'key' => 'additional_price',
            'value' => 15000, 
        ]);
    }
}
