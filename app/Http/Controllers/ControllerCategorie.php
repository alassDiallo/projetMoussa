<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class ControllerCategorie extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Categorie::orderBy('nom')->paginate(10);
      return view('categories.listerCategorie',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.ajoutCategorie');
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
            'nom'=>'required|string|min:2|max:30|unique:categories',
        ]);
        Categorie::create([
            'nom'=>$request->nom,
            'slug'=>$request->nom.rand(0,100)
        ]);
            flash('categorie ajouter avec succé');
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('categories.categorie',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.modif',compact('categorie'));
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
        $this->validate($request,[
            'nom'=>'required|string|min:2|max:30|unique:categories',
        ]);
        Categorie::where('slug',$id)->update([
            'nom'=>$request->nom,
            ]);
            flash('categorie modifier avec succé');
            return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::where('slug',$id)->delete();
        flash('categorie supprimer avec succé');
        return redirect()->route('categorie.index');
    }
}
