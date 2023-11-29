<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('property_types')->truncate();

        DB::table('property_types')->insert([
            ['type' => 'Maison', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Appartement', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Commerce', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Bureau', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
