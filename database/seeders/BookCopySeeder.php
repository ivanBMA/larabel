<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Copy;
use Illuminate\Support\Facades\DB;

class BookCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('books')->truncate();
        DB::table('copies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Book::factory()
            ->has(Copy::factory()->count(3))
            ->count(12)
            ->create();
    }
}
