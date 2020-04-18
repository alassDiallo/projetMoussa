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

if(! function_exists('getCouleur')){
    function getCouleur(){
        $numero = rand(1,5);
        $c;
        switch($numero){
            case 1 : $c = "primary";
        break;
        case 2 : $c = "warning";
        break;
        case 3 : $c = "success";
        break;
        case 4 : $c = "danger";
        break;
        case 5 : $c = "light";
        break;
        }
            return $c;
    }
}

if(! function_exists('getEtat')){
    function getEtat($i){
        $c;
        switch($i){
            case 0 : $c="danger";
        break;
        case 1 : $c = "success";
        break;
        deafault :
            $c = "success";
        }
            return $c;
    }
}
