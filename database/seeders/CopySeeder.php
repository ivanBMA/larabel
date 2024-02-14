<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Copy;
use Illuminate\Support\Facades\DB;

class CopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('copy')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Book::factory()->count(12)->create();
        */

        /*
        Copy::create([
            'numero_edicion' => 4,
            'editorial' => 'Alfombra',
            'fecha_edicion' => '2019-05-12',
            'book_id' => 1
        ]);
        Copy::create([
            'numero_edicion' => 9,
            'editorial' => 'paca',
            'fecha_edicion' => '2015-05-11',
            'book_id' => 1
        ]);
        Copy::create([
            'numero_edicion' => 7,
            'editorial' => 'salsa',
            'fecha_edicion' => '2014-05-13',
            'book_id' => 1
        ]);
        Copy::create([
            'numero_edicion' => 6,
            'editorial' => 'tapa',
            'fecha_edicion' => '2013-05-16',
            'book_id' => 2
        ]);
        */
    }
}
