<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion des Elèves";
        return view('admin.eleves.eleves', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classe::all();
        $title = "Ajout d'un Elève";

        return view('admin.eleves.createeleve', compact('title','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Eleve::create([
            'nom' => $request->nom,
            'prenom'=>$request->prenom, 
            'postnom' => $request->postnom,
            'email' => $request->email,
            'contact' => $request->contact,
            'sexe' => $request->sexe,
            'adresse' => $request->adresse,
            'nationalite' => $request->nationalite,
            'groupe_sanguin' => $request->groupe_sanguin,
            'date_naissance' => $request->date_naissance,
            'classe_id' => $request->classe_id,
            'user_id' => $request->user_id,
            'status' => '1',

        ]);

            session()->flash('message', $request->nom . ' Ajouté avec succes');
            return redirect()->route('eleves.index');
    }
            //

        
    

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
