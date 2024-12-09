<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAnneeScolaire;
use App\Models\AnneeScolaire;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          $title = "Année Scolaire";
          $annees = AnneeScolaire::all();

        return view('admin.annees.annees',compact('annees', 'title'));
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
    public function store(RequestAnneeScolaire $request)
    {
        AnneeScolaire::create([
            'annee' => $request->annee, 'statut' => 1]);

        session()->flash('message', ' Ajouté avec succes');
        return redirect()->route('annees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
        $title = "Année Scolaire";
        
        $annees = AnneeScolaire::findOrFail($id);
        return view('admin.annees.anneeid', compact('annees','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $annees = AnneeScolaire::findOrFail($id);
        return view('admin.annees.anneeedit', compact('annees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestAnneeScolaire $request,  $id)
    {
        // 
        $annees = AnneeScolaire::findOrFail($id);

        $annees->update([
            'annee' => $request->annee, 'statut' => $request->statut
        ]);

        session()->flash('message', $request->annee . ' a été modifié avec succes');
        return redirect()->route('annees.index');
        // return redirect()->route('annees.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        AnneeScolaire::destroy($id);
        session()->flash('supprimer','Suppression avec succes');
        return redirect()->route('annees.index');
    }
    public function deactiv(string $id)
    {
        // 
        $annees = AnneeScolaire::findOrFail($id);

        $annees->update(['statut' => 0]);

        session()->flash('desactif','Desactiver avec succes');
        return redirect()->route('annees.index');
    }
    public function Activ(string $id)
    {
        //
        $annees = AnneeScolaire::findOrFail($id);

        $annees->update(['statut' => 1]);

        session()->flash('desactif','Activer avec succes');
        return redirect()->route('annees.index');
    }

    public function annees_passees()
    {
        $title = 'Les Années passées';
        $annees = AnneeScolaire::onlyTrashed()->get();
        return view('admin.annees.anneepassee', compact('annees','title'));
    }

        // Restore deleted item
    public function restore($id)
    {

            $annee = AnneeScolaire::onlyTrashed()->findOrFail($id);
            $annee->restore();
    
            return redirect()->back();
    }
        
        // Delete item completely
    public function forceDelete($id)
    {
            
            $annee = AnneeScolaire::onlyTrashed()->findOrFail($id);     
            $annee->forceDelete();
    
            return redirect()->back();
    } 
}
