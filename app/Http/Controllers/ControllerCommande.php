<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Console\Command;
use App\Models\Commande;
use Illuminate\Http\Request;

class ControllerCommande extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::orderBy('created_at')->paginate(10);
        return view('commandes.listerLesCommandes',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'quantite'=>'required|integer|min:1|max:50',
            'telephone'=>'required|digits:9|starts_with:77,78,70,76,33,30',
        ]);

       // dd($request->telephone);
        if($prod = Produit::where('slug',request()->produit)->first()){
            Commande::create([
                'telephoneClient'=>$request->telephone,
                'numeroCommande'=> numero(),
                'etat'=>0,
            ])->produits()->attach($prod->id,[
                'montant'=>($request->quantite*$prod->prix),
                'quantiteCommande'=>$request->quantite
            ]);
            flash('Votre commande à bien été enregistrer un agent vous contactera pour finalisé la commande');
            return redirect()->route('produits.index');
        }
        flash("désolé mais ce produit n'existe pas",'danger');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function commander(){

        $prod = Produit::where('slug',request()->produit)->first();

        return view('commandes.commandes',compact('prod'));
    }

    public function enregistrer(Request $request,$prod){
            dd('enregistrer');
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
