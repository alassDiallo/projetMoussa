<?php
use App\Models\Produit;
use Illuminate\Database\Seeder;

class produitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create();
        for($i=0;$i<25;$i++){
            Produit::create([
                'titre'=> $fake->sentence(3),
                'slug'=>$fake->slug,
                'qualite'=>'standar',
                'quantite'=>rand(1,50),
                'sousTitre'=>$fake->sentence(5),
                'description'=>"Entreprise mousssa wlly sene",
                'prix'=>$fake->numberBetween(100,300)*100,
                'image'=>'https://via.placeholder.com/200x250',
                'categorie_id'=>rand(1,4),
            ]);
    }
}
}
