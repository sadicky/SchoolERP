<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Option;
use App\Models\Tuteur;
use App\Models\Section;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id') 
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->get();
        return view('admin.eleves.eleves', compact('eleves', 'classes', 'title'));
    }

    public function dashboard_eleve()
    {
        //
        $title = "Dashboard"; 
        $id = Auth::user()->eleve->eleve_id;
        $classe_id = Auth::user()->eleve->classe_id;
        $eleve = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('e.eleve_id', '=',$id)
        ->first();

        $tuteur = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->join('tbl_tuteurs as t', 't.tuteur_id','=','e.tuteur_id')
        ->where('e.eleve_id', '=',$id)
        ->first();
        
        $camarades = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('cl.classe_id', '=',$classe_id)
        ->get();
        return view('student.dashboard',compact('title', 'eleve','tuteur','camarades'));
    } 

    public function eleves_from_teacher()
    {
        // 
        $title = "Gestion des Elèves";
        $classes = Classe::all(); 
        $eleves = DB::table('tbl_eleves as e')
        ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id') 
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->get();
        return view('teacher.eleves',compact('title', 'eleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classe::all();
        $sections = Section::all();
        $options = Option::all();
        $title = "Ajout d'un Elève";

        return view('admin.eleves.create', compact('title', 'options', 'sections', 'classes'));
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
            'sexe' => ['required', 'max:255'],
            'classe_id' => ['required', 'max:255'],
        ]); 

        $stringE = "0123456789";
        $stringE = str_shuffle($stringE);
        $matriculeE = substr($stringE, 0, 6);

        $userE = Utilisateur::create([
            'matricule' => $matriculeE,
            'password' => Hash::make('123456'),
            'role_id' => Role::where('role_name', 'Eleve')->firstOrFail()->role_id,
            'status' => '1'

        ]);

        $tuteur = Tuteur::where('contact', $request->tuteur_tel)->first();
        @$tuteur_id = $tuteur->tuteur_id;

        if (!$tuteur) {

            $stringT = "0123456789";
            $stringT = str_shuffle($stringT);
            $matriculeT = substr($stringT, 0, 6);

            $userT = Utilisateur::create([
                'matricule' => $matriculeT,
                'password' => Hash::make('123456'),
                'role_id' => Role::where('role_name', 'Tuteur')->firstOrFail()->role_id,
                'status' => '1'
            ]);

            $tut = Tuteur::create([
                'nom' => $request->tuteur_nom,
                'prenom' => $request->tuteur_prenom,
                'postnom' => $request->tuteur_postnom,
                'email' => $request->tuteur_email,
                'contact' => $request->tuteur_tel,
                'sexe' => $request->tuteur_sexe,
                'adresse' => $request->tuteur_adresse,
                'profession' => $request->tuteur_job,
                'nationalite' => $request->tuteur_nat,
                'relation' => $request->tuteur_relation,
                'user_id' => $userT->user_id,
                'status' => 1
            ]);
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
            $eleve->tuteur_id = $tut->tuteur_id;
            $eleve->user_id = $userE->user_id;
            if($request->payer==1){
                $eleve->statut = '1' ;
            }
            else{
                $eleve->statut = '0' ;
            }
            $eleve->save();
        }else{
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
            $eleve->tuteur_id = $tuteur_id;
            $eleve->user_id = $userE->user_id;
            if($request->payer==1){
                $eleve->statut = '1' ;
            }
            else{
                $eleve->statut = '0' ;
            }
            $eleve->save();
        }       

        session()->flash('message', $request->nom . ' ' . $request->prenom . ' Ajouté avec succes');
        return redirect()->route('eleves.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $title = 'Détail de l\'Eleve';

        // $eleve = DB::table('tbl_eleves as e')
        //     ->join('tbl_classes as c', 'c.classe_id', '=', 'e.classe_id')
        //     ->where('e.eleve_id', '=', $id)->first();

            $eleve = DB::table('tbl_eleves as e')
            ->join('tbl_classes as cl', 'cl.classe_id','=','e.classe_id')
            ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
            ->join('tbl_section as s', 's.section_id','=','o.section_id')
            ->where('e.eleve_id', '=',$id)
            ->first();
        return view('admin.eleves.eleve', compact('eleve', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Editer un Eleve';
        $eleve = DB::table('tbl_eleves as e')->join('tbl_classes as c', 'c.classe_id', '=', 'e.classe_id')
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

    public function checkTutor(Request $request)
    {
        //
        $tuteur_tel = $request->input('tuteur_tel');
        $tutor = Tuteur::where('contact', $tuteur_tel)->first();
        if ($tutor) {
            return response()->json(
                [
                    'exists' => true,
                    'data' => [
                        'nom' => $tutor->nom,
                        'prenom' => $tutor->prenom,
                        'postnom' => $tutor->postnom,
                        'email' => $tutor->email,
                        'sexe' => $tutor->sexe,
                        'relation' => $tutor->relation,
                        'adresse' => $tutor->adresse,
                        'profession' => $tutor->profession,
                        'nationalite' => $tutor->nationalite,
                        'user_id' => $tutor->user_id,
                    ]
                ]
            );
        } else {
            return response()->json(['exists' => false]);
        }
    }

 
}
