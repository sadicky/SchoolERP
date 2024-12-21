<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Tuteur;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTuteurRequest;
use App\Http\Requests\UpdateTuteurRequest;

class TuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion des Tuteurs"; 
        $tuteurs = Tuteur::all();

        return view('admin.parents.all',compact('title', 'tuteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function dashboard()
    {
        //
        $title = "Dashboard"; 
        $id = Auth::user()->tuteur->tuteur_id;
        
        $eleves = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('e.tuteur_id', '=',$id)
        ->get();

        $tuteur = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->join('tbl_tuteurs as t', 't.tuteur_id','=','e.tuteur_id')
        ->where('t.tuteur_id', '=',$id)
        ->first();
        
        return view('parent.dashboard',compact('title', 'eleves','tuteur'));
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTuteurRequest $request)
    {
        //   
        $string = "qwertyuioplkjhgfdsazxcvbnm0123456789";
        $string = str_shuffle($string);
        $matricule = substr($string, 0, 8);
        
         $userT = Utilisateur::create([
        'matricule'=>$matricule,
        'password'=>Hash::make('123456'),
        'role_id'=>Role::where('role_name','Tuteur')->firstOrFail()->role_id,
        'status' => '1'

   ]);
   
        
        $tuteurs = Tuteur::create([
             'nom'=>$request->tuteur_nom,
             'prenom'=>$request->tuteur_prenom,
             'postnom'=>$request->tuteur_postnom,
             'email'=>$request->tuteur_email,
             'contact'=>$request->tuteur_tel,
             'sexe'=>$request->tuteur_sexe,
             'adresse'=>$request->tuteur_adresse,
             'profession'=>$request->tuteur_job,
             'nationalite'=>$request->tuteur_nat,
             'user_id'=>$userT->user_id,
             'status' => '1'
        ]);
    
            // session()->flash('message', $request->cours_name . ' Ajouté avec succes');
            // return redirect()->route('cours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tuteur $tuteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tuteur $tuteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTuteurRequest $request, Tuteur $tuteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tuteur $tuteur)
    {
        //
    }
}
