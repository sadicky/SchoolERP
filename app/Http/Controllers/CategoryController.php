<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $title = "Catégories(Options)";
        $categories = Category::all();

      return view('admin.categories_options.categories',compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        Category::create([ 'category' => $request->category, 'status' => '1']);

        session()->flash('message', ' Ajouté avec succes');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        // 
        $title = "Categorie";
        
        $categories = Category::findOrFail($id);
        return view('admin.categories_options.categoryid', compact('categories','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer la Categorie";
        $categories = Category::findOrFail($id);
        
        return view('admin.categories_options.categoryedit', compact('categories','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $categories = Category::findOrFail($id);

        $categories->update(['category' => $request->category]);

        session()->flash('message', $request->category . ' a été modifié avec succes');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function statut(StoreCategoryRequest $request, $id)
    {
        //
        $categories = Category::findOrFail($id);

        $categories->status = !$categories->status ;
        
        $categories->update(['status' => $categories->status]);

        session()->flash('message', $request->category . ' a été modifié avec succes');
        return redirect()->route('categories.index');
    }

}
