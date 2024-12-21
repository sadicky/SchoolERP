<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use App\Models\Communique;
use Illuminate\Support\Facades\DB;

class CommuniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion des Communiques";
        $communiques = DB::table('tbl_communiques as c')
        ->join('tbl_annee as a', 'a.annee_id','=','c.annee_id')
        ->get();

        return view('admin.communiques.communiques', compact('title','communiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Ajout d'un communiqué";
        $annees = AnneeScolaire::all();

        return view('admin.communiques.create', compact('title','annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => ['required'],
            'date_communique' => ['required'],
            'concerned' => ['required'],
            'annee_id' => ['required'],
        ]);
            
        //
    
        $communique = new Communique();
        $communique->description = $request->description;
        $communique->date_communique = $request->date_communique;
        $communique->concerned = $request->concerned;
        $communique->statut_communique = $request->statut_communique;
        $communique->annee_id = $request->annee_id;
        $communique->status = 1;
        $communique->save();

        return redirect()->route('communiques.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $title = "Détail du communiqué";
        $communique = DB::table('tbl_communiques as c')
        ->join('tbl_annee as a','a.annee_id','=','c.annee_id')
        ->first();

        return view('admin.communiques.communique', compact('title','communique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Modification d'un communiqué";
        $annees = AnneeScolaire::all();
        $communique = DB::table('tbl_communiques as c')
        ->join('tbl_annee as a','a.annee_id','=','c.annee_id')
        ->first();

        return view('admin.communiques.edit', compact('title','communique','annees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $communique = Communique::findOrFail($id);
        $request->validate([
            'description' => ['required'],
            'date_communique' => ['required'],
            'concerned' => ['required'],
            'annee_id' => ['required'],
        ]);
            
        //
    
        
        $communique->description = $request->description;
        $communique->date_communique = $request->date_communique;
        $communique->concerned = $request->concerned;
        $communique->statut_communique = $request->statut_communique;
        $communique->annee_id = $request->annee_id;
        $communique->status = 1;
        $communique->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $communique = Communique::findOrFail($id);
        $communique->delete();

        return redirect()->route('communiques.index');
    }

    // Restore deleted item
    public function restore($id)
    {

        $communique = Communique::onlyTrashed()->findOrFail($id);
        $communique->restore();

        return redirect()->back();
    }
    
    // Delete item completely
    public function forceDelete($id)
    {
        
        $communique = Communique::onlyTrashed()->findOrFail($id);
        
        $communique->forceDelete();

        return redirect()->back();
    }
}
