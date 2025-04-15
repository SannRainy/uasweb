<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Tambahkan ini
use Illuminate\Support\Str;

class CardSeeder extends Seeder
{
    public function run()
    {
        DB::table('cards')->insert([
            'title' => 'Pantai Bali',
            'user' => 'JohnDoe',
            'recommended' => 'Travel',
            'media_url' => '/public/img/1.jpg',
            'media_type' => 'image',
        ]);
    }
}
