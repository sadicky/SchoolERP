<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Fiche;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateFicheRequest;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
          $title = "Fiche de Cotation";
          $sections = Section::all();
          $annees = AnneeScolaire::where('statut','1')          
          ->orderBy('annee_id', 'desc')
          ->limit(1)
          ->get();
  

          return view('admin.fiches.all',compact('annees', 'title', 'sections'));
        //   return view('admin.eleves.bulletins.primaire',compact('annees', 'title', 'sections'));
    }

    public function bulletin(){
            // $VAR= view('admin.eleves.bulletins.secondaire');
            
            // if ($_SESSION["cat"]=="pri") 
            //     $VAR=view('admin.eleves.bulletins.primaire');
            
            // if ($_SESSION["cat"]=="mat") 
            //     $VAR=view('admin.eleves.bulletins.maternelle');

            // return view('admin.eleves.bulletins.secondaire');
            
     }

    public function search(Request $request)
    {
        $request->validate([
            'classe_id' => 'required',
            'cours_id' => 'required',
        ]);

        $title = "Fiche de Cotation";
        $sections = Section::all();
        
        $classe = $request->input('classe_id');
        $cours = $request->input('cours_id');
        $periode = $request->input('periode_id');
        $ponderation = $request->input('ponderation');

        $annees = AnneeScolaire::where('statut','1')          
        ->orderBy('annee_id', 'desc')
        ->limit(1)
        ->first();

        $eleves = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('e.classe_id', '=',$classe)
        ->where('e.statut', '=','1')
        ->get();

        return view('admin.fiches.all',compact('annees','eleves', 'title', 'sections','classe', 'cours','periode','ponderation'));
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
    public function store(Request $request, $cours)
    {
        $validatedData = $request->validate([
            'periode_id' => 'required|integer',
            'eleve_id' => 'required|array',
            'eleve_id.*' => 'required|integer',
            'note' => 'required|array',
            'note.*' => 'required|numeric|min:0|max:20',
            'ponderation' => 'required|numeric|min:0|max:100',
        ]);

        $notes = [];
    foreach ($request->eleve_id as $index => $eleveId) {
        $notes[] = [
            'periode_id' => $request->periode_id,
            'eleve_id' => $eleveId,
            'cours_id' => $cours,
            'annee_id' => $request->annee_id,
            'note' => $request->note[$index],
            'ponderation' => $request->ponderation,
            'date_note' => date('Y-m-d'),
            'status' => '1'
        ];
    }
        Fiche::insert($notes); 
        // DB::table('tbl_notes')->insert($notes);

        session()->flash('message',' Note Ajoutée avec succes');
        return redirect()->route('fiches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fiche $fiche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fiche $fiche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFicheRequest $request, Fiche $fiche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fiche $fiche)
    {
        //
    }
}
