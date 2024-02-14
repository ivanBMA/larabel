<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Copy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(booksSeeder::class);
        $this->call(CoverSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(BookCopySeeder::class);
        // $this->call(CopySeeder::class);
        // $this->call(BookPartnerSeeder::class);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
