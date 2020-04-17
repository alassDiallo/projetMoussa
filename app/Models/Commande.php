<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['telephoneClient','numeroCommande'];

    public function produits(){
        return $this->belongsToMany('App\Models\Produit','commande_produit')
                    ->with('montant','quantiteCommande','create_at')
                    ->withTimestamps();
    }
}
