<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ControllerProduit extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->categorie)
        {
            $produits = Produit::whereHas('categorie',function($query){
                $query->where('slug',request()->categorie);
            })->orderBy('created_at','DESC')->paginate(6);
        }
        else{
            $produits = Produit::orderBy('created_at','DESC')->paginate(6);
        }

        return view('produits.index')->with('produits',$produits);
    }

    public function listProduit(){
        if(request()->categorie)
        {
            $produits = Produit::whereHas('categorie',function($query){
                $query->where('slug',request()->categorie);
            })->orderBy('created_at','DESC')->paginate(6);
        }
        else{
            $produits = Produit::orderBy('created_at','DESC')->paginate(10);
        }

        return view('produits.listerProduit')->with('produits',$produits);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categorie = Categorie::orderBy('nom')->get();
       return view('produits.ajoutProduit',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $prod = Produit::where('categorie_id',$produit->categorie->id)->orderBy('titre')->paginate(4);
        return view('produits.show',compact('produit','prod'));
    }

    public function recherche(Request $request){
        $request->validate([
            'recherche'=>'required|min:2|alpha',
        ]);
        $produits = Produit::where('titre','like',"%$request->recherche%")
                                ->orWhere('description','like',"%$request->recherche%")->orderBy('created_at','DESC')->paginate(6);

                    return view('produits.recherche')->with('produits',$produits);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
