<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('partners')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
        Partner::factory()->count(12)->create();
        /*
        Partner::create([
            'dni' => '12345678H',
            'nombre' => 'Pedro',
            'apellido' => 'Fernandez perez',
            'edad' => 38,
            'email' => 'PFernandez@hotmail.com'
        ]);

        Partner::create([
            'dni' => '12345678A',
            'nombre' => 'Ivan',
            'apellido' => 'perez',
            'edad' => 33,
            'email' => 'ivan@hotmail.com'
        ]);
        */
    }
}
