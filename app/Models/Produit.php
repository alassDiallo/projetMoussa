<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['titre','slug','soustitre','description','prix','quantite','qualite','categorie_id','image'];

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function commandes(){
        return $this->belongsToMany('App\Models\Commande','commande_produit')
                    ->with('montant','quantiteCommande','create_at')
                    ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
