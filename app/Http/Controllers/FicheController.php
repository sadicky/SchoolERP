<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Fiche;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateFicheRequest;
use PhpParser\Node\Stmt\Foreach_;

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
        $annees = AnneeScolaire::where('statut', '1')
            ->orderBy('annee_id', 'desc')
            ->limit(1)
            ->get();


        return view('admin.fiches.all', compact('annees', 'title', 'sections'));
        //   return view('admin.eleves.bulletins.primaire',compact('annees', 'title', 'sections'));
    }

    public function bulletin($id)
    {

        $eleve = DB::table('tbl_eleves as e')
            ->join('tbl_classes as cl', 'cl.classe_id', '=', 'e.classe_id')
            ->join('tbl_options as o', 'o.option_id', '=', 'cl.option_id')
            ->join('tbl_section as s', 's.section_id', '=', 'o.section_id')
            ->join('tbl_users as u', 'u.user_id', '=', 'e.user_id')
            ->where('e.eleve_id', '=', $id)
            ->where('e.statut', '=', '1')
            ->first();

        $cours = DB::table('tbl_cours as c')
            ->join('tbl_cours_classes as cc', 'cc.cours_id', '=', 'c.cours_id')
            ->join('tbl_classes as cl', 'cl.classe_id', '=', 'cc.classe_id')
            ->where('cl.classe_id', '=', $eleve->classe_id)
            ->where('c.status', '=', '1')
            ->get();

        $annee = AnneeScolaire::where('statut', '1')
            ->orderBy('annee_id', 'desc')
            ->limit(1)
            ->first();


        // $notes=DB::table('tbl_notes as n')
        // ->join('tbl_cours as c', 'c.cours_id','=','n.cours_id')
        // ->join('tbl_eleves as e', 'e.eleve_id','=','n.eleve_id')
        // ->join('tbl_periodes as p', 'p.periode_id','=','n.periode_id')
        // ->join('tbl_annee as a', 'a.annee_id','=','n.annee_id')
        // ->where('a.annee_id', '=',$annee->annee_id)
        // ->where('e.eleve_id', '=',$eleve->eleve_id)
        // ->first();

        $notes_periode1 = DB::table('tbl_notes as n')
            ->join('tbl_cours as c', 'c.cours_id', '=', 'n.cours_id')
            ->join('tbl_cours_classes as cc', 'cc.cours_id', '=', 'c.cours_id')
            ->join('tbl_eleves as e', 'e.eleve_id', '=', 'n.eleve_id')
            ->join('tbl_periodes as p', 'p.periode_id', '=', 'n.periode_id')
            ->join('tbl_annee as a', 'a.annee_id', '=', 'n.annee_id')
            ->join('tbl_classes as cl', 'cl.classe_id', '=', 'cc.classe_id')
            ->where('cl.classe_id', '=', $eleve->classe_id)
            ->where('a.annee_id', '=', $annee->annee_id)       // Filtre par année scolaire
            ->where('e.eleve_id', '=', $eleve->eleve_id)       // Filtre par élève
            ->where('p.periode_name', '=', "1ère Période")     // Filtre par période
            ->select('n.note', 'c.cours_name', 'cc.ponderation')
            ->get();

        $i = 0;
        $rang1 = 0;
        $x = 100;
        $classement = DB::table('tbl_notes as n')
            ->join('tbl_cours as c', 'c.cours_id', '=', 'n.cours_id')
            ->join('tbl_eleves as e', 'e.eleve_id', '=', 'n.eleve_id')
            ->join('tbl_periodes as p', 'p.periode_id', '=', 'n.periode_id')
            ->join('tbl_annee as a', 'a.annee_id', '=', 'n.annee_id')
            ->where('a.annee_id', '=', $annee->annee_id)
            ->where('e.eleve_id', '=', $eleve->eleve_id)
            ->where('p.periode_name', '=', "1ère Période")
            ->get();

        foreach ($classement as $c) {
            $i++;
            $tab[] = $c;
            if ($c->eleve_id == $eleve->eleve_id) {
                $rang1 = $i;
            }
        }
        $rang1 =  $rang1;








        // Récupérer toutes les périodes
        // $periodes = ['1ère Période', '2ème Période', '1èr Examen Semestre', '3ème Période', '4ème Période', '2e Examen Semestre'];

        // Initialiser un tableau pour stocker les données
        // $notes_par_cours_et_periode = [];

        // // Boucle sur les cours
        // $cours = DB::table('tbl_cours as c')
        //     ->join('tbl_cours_classes as cc', 'cc.cours_id', '=', 'c.cours_id') // Jointure pour la pondération
        //     ->where('cc.classe_id', '=', $eleve->classe_id) // Filtre par classe
        //     ->select('c.cours_id', 'c.cours_name', 'cc.ponderation') // Sélectionne les colonnes nécessaires
        //     ->get(); // Tous les cours disponibles
        // foreach ($cours as $cours_item) {
        //     // Récupérer les notes pour chaque période
        //     $notes = [];
        //     foreach ($periodes as $periode) {
        //         $note = DB::table('tbl_notes as n')
        //             ->join('tbl_cours as c', 'c.cours_id', '=', 'n.cours_id')
        //             ->join('tbl_eleves as e', 'e.eleve_id', '=', 'n.eleve_id')
        //             ->join('tbl_periodes as p', 'p.periode_id', '=', 'n.periode_id')
        //             ->join('tbl_annee as a', 'a.annee_id', '=', 'n.annee_id')
        //             ->where('a.annee_id', '=', $annee->annee_id) // Filtre par année scolaire
        //             ->where('e.eleve_id', '=', $eleve->eleve_id) // Filtre par élève
        //             ->where('c.cours_id', '=', $cours_item->cours_id) // Filtre par cours
        //             ->where('p.periode_name', '=', $periode) // Filtre par période
        //             ->value('n.note'); // Récupère la note uniquement (ou null si absente)

        //         $notes[$periode] = $note ?? '-'; // Ajouter la note ou "-" si absente
        //     }

        //     // Ajouter les notes pour ce cours
        //     $notes_par_cours_et_periode[] = [
        //         'cours_name' => $cours_item->cours_name,
        //         'notes' => $notes,
        //         'ponderation' => $cours_item->ponderation,
        //     ];
        // }

        // Envoyer les données à la vue
        // return view('nom_de_la_vue', compact('notes_par_cours_et_periode', 'periodes'));


        return view('admin.eleves.bulletins.secondaires', compact('eleve', 'annee', 'cours', 'notes_periode1', 'rang1'));
    }

    public function bulletinM()
    {
        // $VAR= view('admin.eleves.bulletins.secondaire');

        // if ($_SESSION["cat"]=="pri") 
        //     $VAR=view('admin.eleves.bulletins.primaire');

        // if ($_SESSION["cat"]=="mat") 
        //     $VAR=view('admin.eleves.bulletins.maternelle');

        // return view('admin.eleves.bulletins.secondaire');
        return "Maternelle";
    }
    public function bulletinP()
    {
        // $VAR= view('admin.eleves.bulletins.secondaire');

        // if ($_SESSION["cat"]=="pri") 
        //     $VAR=view('admin.eleves.bulletins.primaire');

        // if ($_SESSION["cat"]=="mat") 
        //     $VAR=view('admin.eleves.bulletins.maternelle');

        // return view('admin.eleves.bulletins.secondaire');
        return "Primaire";
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

        $annees = AnneeScolaire::where('statut', '1')
            ->orderBy('annee_id', 'desc')
            ->limit(1)
            ->first();

        $eleves = DB::table('tbl_eleves as e')
            ->join('tbl_classes as cl', 'cl.classe_id', '=', 'e.classe_id')
            ->join('tbl_options as o', 'o.option_id', '=', 'cl.option_id')
            ->join('tbl_section as s', 's.section_id', '=', 'o.section_id')
            ->where('e.classe_id', '=', $classe)
            ->where('e.statut', '=', '1')
            ->get();

        return view('admin.fiches.all', compact('annees', 'eleves', 'title', 'sections', 'classe', 'cours', 'periode', 'ponderation'));
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

        session()->flash('message', ' Note Ajoutée avec succes');
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
