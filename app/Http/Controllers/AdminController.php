<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestions des Admins";
        $utilisateur = Auth::user();
        // $admin = $utilisateur->admin;
        // $eleve = $utilisateur->eleve;
        // $tuteur = $utilisateur->tuteur;
        // $enseignant = $utilisateur->enseignant;
        $users = Admin::all(); 
        $roles = Role::all();
        return view('admin.users.all',compact('users', 'title','roles')); 
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
    public function store(StoreAdminRequest $request)
    {
        //
        $string = "0123456789";
        $string = str_shuffle($string);
        $matricule = substr($string, 0, 6);

        $user = Utilisateur::create([
            'matricule' => $matricule,
            'password' => Hash::make('123456'),
            'role_id' => Role::where('role_name', 'Admin')->firstOrFail()->role_id,
            'status' => '1'
        ]);

        Admin::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'postnom' => $request->postnom,
            'email' => $request->email,
            'contact' => $request->contact,
            'sexe' => $request->sexe,
            'user_id' => $user->user_id,
            'statut' => '1',
        ]);
        
        session()->flash('message', $request->nom . ' ' . $request->prenom . ' Ajouté avec succes');
        return redirect()->route('admins.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
