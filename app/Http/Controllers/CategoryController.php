<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categorie', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCategorie(Request $request)
    {
        //dd($request->all());
        $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
                'description' => 'required|string|max:255',
            ], [
                'name.unique' => 'Cette catégorie existe déjà.',
                'name.required' => 'Le nom de la catégorie est requis.',
                'description.required' => 'La description est requise.',
        ]);

        $categorie = new Category();
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect()->route('admin.categorie',compact('categorie'))->with('success', 'Registration successful. You can now log in.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorie = Category::findOrFail($id);
        $categorie->name = $request->input('name'); // par exemple
        $categorie->description = $request->input('description'); 
        $categorie->save();

        return redirect()->route('admin.categorie')->with('success', 'Catégorie mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
    {
        $categorie = Category::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categorie')->with('success', 'Catégorie supprimée.');
    }
}
