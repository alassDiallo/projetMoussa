<?php

use App\Models\Commande;

if(! function_exists('getPrice')){
function getPrice($prix){
    return number_format(floatVal($prix),2,',', ' ')." Fcfa";
}
}
if(! function_exists('flash')){
    function flash($message,$type='success'){
        session()->flash('notification.message',$message);
        session()->flash('notification.type',$type);
    }
}

if(! function_exists('numero')){
    function numero(){
        $numero = rand(0,1000000000)."SN";
        if(Commande::where('numeroCommande',$numero)->first()){
            return numero();
        }
        return $numero;
    }
}
