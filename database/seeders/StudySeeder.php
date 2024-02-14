<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Study;
//use DB;
use Illuminate\Support\Facades\DB;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Study::create([
            'code' => 'IFC303',
            'name' => 'Desarrolo de aplicaciones web',
            //'abreviation' => 'DAW'
        ]);

        DB::table('studies')->insert([
            'code' => 'IFC303',
            'name' => 'Desarrolo de aplicaciones web',
            //'abreviation' => 'DAW'
        ]);
    }
}
