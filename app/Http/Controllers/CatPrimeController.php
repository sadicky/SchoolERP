<?php

namespace App\Http\Controllers;

use App\Models\CatPrime;
use App\Http\Requests\StoreCatPrimeRequest;
use App\Http\Requests\UpdateCatPrimeRequest;

class CatPrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Categories Prime";
        $categories_primes = CatPrime::all();
      return view('admin.categories_primes.all',compact('categories_primes', 'title')); 
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
    public function store(StoreCatPrimeRequest $request)
    {
        CatPrime::create([ 
                'category_prime' => $request->category_prime,
                'status' => '1']
            );
        
    session()->flash('message', $request->category_prime . ' Ajouté avec succes');
    return redirect()->route('categories_primes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Categorie de Frais";
         
        $categories_primes = CatPrime::findOrFail($id);
        return view('admin.categories_primes.getid', compact('categories_primes','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer la Categorie Prime";
       
        $categories_primes = CatPrime::findOrFail($id);
        return view('admin.categories_primes.edit', compact('categories_primes','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatPrimeRequest $request, $id)
    {
        //
        $categories_primes = CatPrime::findOrFail($id);

        $categories_primes->update([
            'category_prime' => $request->category_prime
        ]);

        session()->flash('message', $request->category_prime . ' a été modifié avec succes');
        return redirect()->route('categories_primes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }
}
