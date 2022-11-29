<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            //Role supreme pour les devellopeurs
            [
                'id' => 1,
                'libelle' => 'supreme',
            ],
            //commissaire
            [
                'id' => 2,
                'libelle' => 'commi',
            ],
            //registeur
            [
                'id' => 3,
                'libelle' => 'regis',
            ],
            //renseignements generaux et moeurs
            [
                'id' => 4,
                'libelle' => 'rgm',
            ],
            // secretariat particulier
            [
                'id' => 5,
                'libelle' => 'sp',
            ],
            // commissaire adjoint
            [
                'id' => 6,
                'libelle' => 'coma',
            ],
            //section des voies publiques
            [
                'id' => 7,
                'libelle' => 'svp',
            ],
            //chef de la section des voies publiques
            [
                'id' => 8,
                'libelle' => 'csvp',
            ],
            //section administrative
            [
                'id' => 9,
                'libelle' => 'sa',
            ],
            //chef de la section administrative
            [
                'id' => 10,
                'libelle' => 'csa',
            ],
            //section de la police judiciaire
            [
                'id' => 11,
                'libelle' => 'spj',
            ],
            //chef de section de la police judiciaire
            [
                'id' => 12,
                'libelle' => 'cspj',
            ],
            // dureau constats des accidents
            [
                'id' => 13,
                'libelle' => 'bca',
            ],
            //chef de peloton
            [
                'id' => 14,
                'libelle' => 'cpel',
            ],
            //chef de poste
            [
                'id' => 15,
                'libelle' => 'cpos',
            ],
            // les brigades (1ere et 2e brigade)
            [
                'id' => 16,
                'libelle' => 'brig',
            ],
            //bureau de delivrance des actes administratifs
            [
                'id' => 17,
                'libelle' => 'bdaa',
            ],
            //bureau de carte d'identité nationale
            [
                'id' => 18,
                'libelle' => 'bcin',
            ],
            //Delegation judiciaire
            [
                'id' => 19,
                'libelle' => 'dj',
            ],
            //Bureau des enqueteurs
            [
                'id' => 20,
                'libelle' => 'be',
            ],
            //Bureau des recherches
            [
                'id' => 21,
                'libelle' => 'br',
            ],
        ]);
    }
}
