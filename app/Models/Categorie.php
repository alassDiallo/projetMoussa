<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
   protected $fillable = ['nom','slug'];

   public function produits(){
       return $this->hasMany('App\Models\Produit');
   }

   public function getRouteKeyName()
   {
       return 'slug';
   }
}
