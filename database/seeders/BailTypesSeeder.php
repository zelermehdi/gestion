<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BailTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate la table pour éviter les doublons
        DB::table('bail_types')->truncate();

        // Insère les données
        DB::table('bail_types')->insert([
            ['type' => 'Commercial', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Location non meublé', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Location meublé', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Précaire', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Professionnel', 'created_at' => now(), 'updated_at' => now()],
        ]);
        // Réactive les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}