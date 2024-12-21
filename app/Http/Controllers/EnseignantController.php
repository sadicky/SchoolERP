<?php

namespace App\Http\Controllers;

use File;
use App\Models\Role;
use App\Models\Grade;
use App\Models\Category;
use App\Models\Enseignant;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion des enseignants"; 
        $enseignants = DB::table('tbl_enseignants as e')
        ->join('tbl_category_options as c', 'c.category_option_id','=','e.category_option_id')
        ->join('tbl_grades as g', 'g.grade_id','=','e.grade')
        ->get();

        return view('admin.enseignants.enseignants',compact('title', 'enseignants'));
    } 

    public function dashboard()
    {
        //
        $title = "Dashboard"; 
        $enseignants = DB::table('tbl_enseignants as e')
        ->join('tbl_category_options as c', 'c.category_option_id','=','e.category_option_id')
        ->join('tbl_grades as g', 'g.grade_id','=','e.grade')
        ->get();

        return view('teacher.dashboard',compact('title', 'enseignants'));
    } 

 

    public function camarades()
    {
        //
        $title = "Mes Camarades";  
        $enseignants = DB::table('tbl_enseignants as e')
        ->join('tbl_category_options as c', 'c.category_option_id','=','e.category_option_id')
        ->join('tbl_grades as g', 'g.grade_id','=','e.grade')
        ->get();

        return view('teacher.camarades',compact('title', 'enseignants'));
    } 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Nouvel Enseignant';

        $category_options = Category::all();
        $grades = Grade::all();
        return view('admin.enseignants.create', compact('title', 'category_options', 'grades'));
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
            'grade' => ['required', 'max:255'],
            'category_option_id' => ['required', 'max:255'],
        ]);

        $stringE = "0123456789";
        $stringE = str_shuffle($stringE);
        $matriculeE = substr($stringE, 0, 6);

        $userE = Utilisateur::create([
            'matricule' => $matriculeE,
            'password' => Hash::make('123456'),
            'role_id' => Role::where('role_name', 'Enseignant')->firstOrFail()->role_id,
            'status' => '1'

        ]);
            
        //
         // Change image original name
         $fileName = time().'_'.$request->image->getClientOriginalName();
         $filePath = $request->image->storeAs('uploads', $fileName);
    
        $enseignant = new Enseignant();
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->postnom = $request->postnom;
        $enseignant->email = $request->email;
        $enseignant->contact = $request->contact;
        $enseignant->sexe = $request->sexe;
        $enseignant->adresse = $request->adresse;
        $enseignant->description = $request->description;
        $enseignant->nationalite = $request->nationalite;
        $enseignant->groupe_sanguin = $request->groupe_sanguin;
        $enseignant->image = 'storage/'.$filePath;

        $enseignant->grade = $request->grade;
        $enseignant->category_option_id = $request->category_option_id;
        $enseignant->user_id = $userE->user_id;
        $enseignant->status = 1;
        $enseignant->save();

        return redirect()->route('enseignants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $title = 'Profil de l\'Enseignant';

        $enseignant = DB::table('tbl_enseignants as e')
        ->join('tbl_category_options as c', 'c.category_option_id','=','e.category_option_id')
        ->join('tbl_grades as g', 'g.grade_id','=','e.grade')
        ->where('e.enseignant_id','=',$id)->first();
        return view('admin.enseignants.enseignant', compact('enseignant','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Editer un Enseignant';
        $enseignant = DB::table('tbl_enseignants as e')->join('tbl_category_options as c', 'c.category_option_id','=','e.category_option_id')
        ->first();

        $category_options = Category::all();
        return view('admin.enseignants.edit', compact('title', 'enseignant', 'category_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'grade' => ['required', 'max:255'],
            'category_option_id' => ['required', 'max:255'],
        ]);
            
        //

    
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->postnom = $request->postnom;
        $enseignant->email = $request->email;
        $enseignant->contact = $request->contact;
        $enseignant->sexe = $request->sexe;
        $enseignant->adresse = $request->adresse;
        $enseignant->description = $request->description;
        $enseignant->nationalite = $request->nationalite;
        $enseignant->groupe_sanguin = $request->groupe_sanguin;

        $enseignant->grade = $request->grade;
        $enseignant->category_option_id = $request->category_option_id;
        $enseignant->user_id = $request->user_id;
        $enseignant->status = 1;
        $enseignant->save();

        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();

        return redirect()->route('enseignants.index');
    }

        // Restore deleted item
        public function restore($id)
        {
    
            $enseignant = Enseignant::onlyTrashed()->findOrFail($id);
            $enseignant->restore();
    
            return redirect()->back();
        }
        
        // Delete item completely
        public function forceDelete($id)
        {
            
            $enseignant = Enseignant::onlyTrashed()->findOrFail($id);
            
            $enseignant->forceDelete();
    
            return redirect()->back();
        }
}
