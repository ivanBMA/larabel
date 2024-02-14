<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Partner;

class BookPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_partner')->truncate();
        $books = Book::all()->pluck('id');//Solamente recupera la columna
        $partners = Partner::inRandomOrder()->get();

        foreach($books as $book){
            foreach($partners as $partner){
                DB::table('book_partner')->insert([
                    'book_id' => $book,
                    'partner_id' => $partner->id,
                    'fecha_reserva' => now(),
                    'fecha_devolucion' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
