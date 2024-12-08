<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Support\Facades\DB;
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
        $classes = Classe::all();
        $eleves = DB::table('tbl_eleves as e')
        ->join('tbl_classes as c','c.classe_id','=','e.classe_id')->get();
        return view('admin.eleves.eleves', compact('eleves','classes','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classe::all();
        $title = "Ajout d'un Elève";

        return view('admin.eleves.create', compact('title','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // 
        $request->validate([
            'nom' => ['required', 'max:255'],
            'prenom' => ['required', 'max:255'],
            'postnom' => ['required', 'max:255'],
            'contact' => ['required', 'max:255'],
            'sexe' => ['required', 'max:255'],
            'adresse' => ['required', 'max:255'],
            'nationalite' => ['required', 'max:255'],
            'date_naissance' => ['required', 'max:255'],
            'provenance' => ['required', 'max:255'],
            'classe_id' => ['required', 'max:255'],
        ]);
            
        //
    
        $eleve = new Eleve();
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->postnom = $request->postnom;
        $eleve->email = $request->email;
        $eleve->contact = $request->contact;
        $eleve->sexe = $request->sexe;
        $eleve->adresse = $request->adresse;
        $eleve->nationalite = $request->nationalite;
        $eleve->groupe_sanguin = $request->groupe_sanguin;
        $eleve->date_naissance = $request->date_naissance;
        $eleve->provenance = $request->provenance;
        $eleve->classe_id = $request->classe_id;
        $eleve->user_id = $request->user_id;
        $eleve->status = 1;
        $eleve->save();

        return redirect()->route('eleves.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $title = 'Détail de l\'Eleve';

        $eleve = DB::table('tbl_eleves as e')
        ->join('tbl_classes as c', 'c.classe_id','=','e.classe_id')
        ->where('e.eleve_id','=',$id)->first();
        return view('admin.eleves.eleve', compact('eleve','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Editer un Eleve';
        $eleve = DB::table('tbl_eleves as e')->join('tbl_classes as c', 'c.classe_id','=','e.classe_id')
        ->first();

        $classes = Classe::all();
        return view('admin.eleves.edit', compact('title', 'eleve', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $eleve = Eleve::findOrFail($id);

        $request->validate([
            'nom' => ['required', 'max:255'],
            'prenom' => ['required', 'max:255'],
            'postnom' => ['required', 'max:255'],
            'contact' => ['required', 'max:255'],
            'sexe' => ['required', 'max:255'],
            'adresse' => ['required', 'max:255'],
            'nationalite' => ['required', 'max:255'],
            'date_naissance' => ['required', 'max:255'],
            'provenance' => ['required', 'max:255'],
            'classe_id' => ['required', 'max:255'],
        ]);
            
        //
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->postnom = $request->postnom;
        $eleve->email = $request->email;
        $eleve->contact = $request->contact;
        $eleve->sexe = $request->sexe;
        $eleve->adresse = $request->adresse;
        $eleve->nationalite = $request->nationalite;
        $eleve->groupe_sanguin = $request->groupe_sanguin;
        $eleve->date_naissance = $request->date_naissance;
        $eleve->provenance = $request->provenance;
        $eleve->classe_id = $request->classe_id;
        $eleve->user_id = $request->user_id;
        $eleve->status = 1;
        $eleve->save();

        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();

        return redirect()->route('eleves.index');
    }

    // Restore deleted item
    public function restore($id)
    {

        $eleve = Eleve::onlyTrashed()->findOrFail($id);
        $eleve->restore();

        return redirect()->back();
    }
    
    // Delete item completely
    public function forceDelete($id)
    {
        
        $eleve = Eleve::onlyTrashed()->findOrFail($id);
        
        $eleve->forceDelete();

        return redirect()->back();
    }
}
