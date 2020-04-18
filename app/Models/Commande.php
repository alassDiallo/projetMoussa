<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['telephoneClient','numeroCommande','etat'];


    public function getRouteKeyName(){
        return 'numeroCommande';
    }

    public function produits(){
        return $this->belongsToMany('App\Models\Produit','commanders')
                    ->withPivot('montant','quantiteCommande','created_at')
                    ->withTimestamps();
    }
}
