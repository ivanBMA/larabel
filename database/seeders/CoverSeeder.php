<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cover;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('covers')->truncate();

        Cover::factory()->count(12)->create();

        /*
        Cover::create([
            'alto' => 4,
            'ancho' => 23,
            'ruta_img' => '/img/files',
            'extension_img' => 'png',
            'book_id' => 1
        ]);

        Cover::create([
            'alto' => 15,
            'ancho' => 30,
            'ruta_img' => '/img/uploadFile',
            'extension_img' => 'svg',
            'book_id' => 2
        ]);

        Cover::create([
            'alto' => 10,
            'ancho' => 20,
            'ruta_img' => '/img/portadas',
            'extension_img' => 'pbg',
            'book_id' => 3
        ]);
        */
    }
}
