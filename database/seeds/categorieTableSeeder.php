<?php

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class categorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'nom'=> 'Tenus Kaki',
            'slug'=> 'tenus',
        ]);

        Categorie::create([
        'nom'=> 'Panthalon',
        'slug'=> 'habit',

        ]);


        Categorie::create([
            'nom'=> 'Chaussure de securite',
            'slug'=> 'Chaussure',
        ]);


        Categorie::create([
            'nom'=> 'Pull',
            'slug'=>'pull',
        ]);


        Categorie::create([
            'nom'=> 'outil de travail',
            'slug'=>'matos',
        ]);
    }
}
