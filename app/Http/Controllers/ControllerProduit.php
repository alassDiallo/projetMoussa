<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
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
        $this->validate($request,[
                'titre'=>'required|string|min:3:unique:produits',
                'sousTitre'=>'required|string|min:3',
                'quantite'=>'required|integer|min:0',
                'qualite'=>'required|string|min:3',
                'categorie'=>'required',
                'prix'=>'required|integer|min:0',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required|string',
        ]);
        $categorie = Categorie::where('slug',$request->categorie)->first();
        if($file = $request->file('image')){
            $ImageUpload = Image::make($file);
            $originalPath = public_path('/img/');
            $ImageUpload->save($originalPath.time().$file->getClientOriginalName());
            $filename = time().$file->getClientOriginalName();
        Produit::create([
            'titre'=>$request->titre,
            'sousTitre'=>$request->sousTitre,
            'quantite'=>$request->quantite,
            'qualite'=>$request->qualite,
            'prix'=>$request->prix,
            'description'=>$request->description,
            'image'=>$filename,
            'categorie_id'=>$categorie->id,
            'slug'=>$request->titre.rand(0,10000000000)
        ]);}
            flash('produit enregistrer avec succé');
            return redirect()->route('listeProduit');
    }

    public function stockage(){
        $produit = Produit::all();
        $categorie = Categorie::all();
        return view('produits.stockage',compact('produit','categorie'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('produits.voir',compact('produit'));
    }

    public function afficherproduit(Produit $produit)
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
