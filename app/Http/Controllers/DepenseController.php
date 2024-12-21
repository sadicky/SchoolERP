<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'montant' => ['required'],
            'beneficiaire' => ['required'],
            'motif' => ['required'],
            'date_depense' => ['required'],
        ]);
            
        //
    
        $depense = new Depense();
        $depense->montant = $request->montant;
        $depense->beneficiaire = $request->beneficiaire;
        $depense->motif = $request->motif;
        $depense->date_depense = $request->date_depense;
        $depense->status = 1;
        $depense->save();

        return redirect()->route('depenses.index');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
