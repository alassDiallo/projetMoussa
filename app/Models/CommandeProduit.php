<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
  protected $fillable = ['montant','quantiteCommande','produit_id','commande_id'];
}
