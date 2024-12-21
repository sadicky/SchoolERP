<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horaire;
use App\Models\Cours;
use App\Models\Classe;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion des horaires";
        $horaires = DB::table('tbl_horaires as h')
        ->join('tbl_classes as c', 'c.classe_id','=','h.classe_id')
        ->join('tbl_cours as crs', 'crs.cours_id','=','h.cours_id')->get();
        return view('admin.horaires.horaires', compact('title','horaires'));
    }

    public function my_schedule()
    {
        //
        $title = "Mes Horaires";
        $horaires = DB::table('tbl_horaires as h')
        ->join('tbl_classes as c', 'c.classe_id','=','h.classe_id')
        ->join('tbl_cours as crs', 'crs.cours_id','=','h.cours_id')->get();
        return view('teacher.my_schedule', compact('title','horaires'));
    }

    public function schedule_e()
    {
        //
        $title = "Mes Horaires";
        $horaires = DB::table('tbl_horaires as h')
        ->join('tbl_classes as c', 'c.classe_id','=','h.classe_id')
        ->join('tbl_cours as crs', 'crs.cours_id','=','h.cours_id')->get();
        return view('student.my_schedule', compact('title','horaires'));
    }

    public function schedule()
    {
        //
        $title = "Mes Horaires";
        $horaires = DB::table('tbl_horaires as h')
        ->join('tbl_classes as c', 'c.classe_id','=','h.classe_id')
        ->join('tbl_cours as crs', 'crs.cours_id','=','h.cours_id')->get();
        return view('parent.my_schedule', compact('title','horaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Nouvel Horaire";

        $sections = Section::all();
        return view('admin.horaires.create', compact('title','sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jours' => ['required'],
            'heure' => ['required'],
            'fin' => ['required'],
            'classe_id' => ['required'],
            'cours_id' => ['required'],
        ]);
            
        //
    
        $horaire = new Horaire();
        $horaire->jours = $request->jours;
        $horaire->heure = $request->heure;
        $horaire->fin = $request->fin;
        $horaire->classe_id = $request->classe_id;
        $horaire->cours_id = $request->cours_id; 
        $horaire->status = '1';
        $horaire->save();

        return redirect()->route('horaires.index');
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
