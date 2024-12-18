<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // **Admin Login**
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('matricule', 'password');
        
            if (Auth::guard('admin')->attempt($credentials)) {

                $user = Auth::guard('admin')->user();

                // Supposons que 1 = Admin
                if ($user->role_id == 1) { 
                    return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie en tant qu\'Admin.');
                }
                Auth::guard('admin')->logout();
                return redirect()->back()->with('error', 'Accès refusé. Vous n\'êtes pas un administrateur.');
            }
            // Retourner une erreur si l'authentification échoue
                return redirect()->back()->with('error', 'Matricule ou mot de passe incorrect.');
        
    }

    // **Enseignant Login**
    public function showEnseignantLoginForm()
    {
        return view('teacher.login');
    }

    public function enseignantLogin(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('enseignant')->attempt($request->only('matricule', 'password'))) {

            $user = Auth::guard('enseignant')->user();

            // Supposons que 1 = Admin
            if ($user->role_id == 4) { 
                return redirect()->route('enseignant.dashboard')->with('success', 'Connexion réussie en tant qu\'Enseignant.');
            }
            Auth::guard('enseignant')->logout();
            return redirect()->back()->with('error', 'Accès refusé. Vous n\'êtes pas un Élève.');
        }

        return back()->with('error', 'matricule ou mot de passe incorrect pour Enseignant.');
    }

    // **Parent Login**
    public function showParentLoginForm()
    {
        return view('parent.login');
    }

    public function parentLogin(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('tuteur')->attempt($request->only('matricule', 'password'))) {

            $user = Auth::guard('tuteur')->user();

            // Supposons que 1 = Admin
            if ($user->role_id == 3) { 
                return redirect()->route('tuteur.dashboard')->with('success', 'Connexion réussie en tant que parent.');
            }
            Auth::guard('tuteur')->logout();
            return redirect()->back()->with('error', 'Accès refusé. Vous n\'êtes pas un Parent.');
        }

        return back()->with('error', 'matricule ou mot de passe incorrect pour Parent.');
    }

    // **Élève Login**
    public function showEleveLoginForm()
    {
        return view('student.login');
    }

    public function eleveLogin(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('eleve')->attempt($request->only('matricule', 'password'))) {

            $user = Auth::guard('eleve')->user();

            // Supposons que 1 = Admin
            if ($user->role_id == 2) { 
                return redirect()->route('eleve.dashboard')->with('success', 'Connexion réussie en tant qu\'Eleve.');
            }
            Auth::guard('eleve')->logout();
            return redirect()->back()->with('error', 'Accès refusé. Vous n\'êtes pas un Élève.');
        }

        return back()->with('error', 'matricule ou mot de passe incorrect pour Élève.');
    }

    // **Logout**
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        } elseif (Auth::guard('enseignant')->check()) {
            Auth::guard('enseignant')->logout();
            return redirect()->route('enseignant.login');
        } elseif (Auth::guard('parent')->check()) {
            Auth::guard('parent')->logout();
            return redirect()->route('parent.login');
        } elseif (Auth::guard('eleve')->check()) {
            Auth::guard('eleve')->logout();
            return redirect()->route('eleve.login');
        }

        // Redirection par défaut si aucun guard n'est authentifié
        return redirect('/');
    }
}
