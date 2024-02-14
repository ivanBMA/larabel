<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
//use DB;
use Illuminate\Support\Facades\DB;

class booksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('books')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Book::factory()->count(12)->create();
        
        /*
        Book::create([
            'titulo' => 'La tienda',
            'autor' => 'Stephen King',
            'fechapub' => '2012-12-12',
            'genero' => 'Novela',
            'numeroPaguinas' => '550'
        ]);

        Book::create([
            'titulo' => 'Poemas editados',
            'autor' => 'Edgar alan poe',
            'fechapub' => '2112-12-12',
            'genero' => 'Novela',
            'numeroPaguinas' => '450'
        ]);

        Book::create([
            'titulo' => 'hoobit',
            'autor' => 'J,R,Tolking',
            'fechapub' => '2023-12-13',
            'genero' => 'Novela',
            'numeroPaguinas' => '250'
        ]);

        Book::create([
            'titulo' => 'Oliver tiwchs',
            'autor' => 'Dikens',
            'fechapub' => '2023-12-23',
            'genero' => 'Novela',
            'numeroPaguinas' => '350'
        ]);*/

    }
}
