<?php

namespace App\Http\Controllers;

use App\Models\Prime;
use App\Models\CatPrime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Gestion du prime";
        $primes = DB::table('tbl_primes as p')
        ->join('tbl_category_prime as c', 'c.category_prime_id','=','p.category_prime_id')
        ->get();

        return view('admin.primes.all', compact('title','primes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Ajout d'une prime";
        $categories_primes = CatPrime::all();

        return view('admin.primes.create', compact('title','categories_primes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_prime_id' => ['required'],
            'montant' => ['required'],
            'matricule' => ['required'],
            'date_prime' => ['required'],
        ]);
            
        //
    
        $prime = new Prime();
        $prime->category_prime_id = $request->category_prime_id;
        $prime->montant = $request->montant;
        $prime->matricule = $request->matricule;
        $prime->date_prime = $request->date_prime;
        $prime->user_id = $request->user_id;
        $prime->status = 1;
        $prime->save();

        return redirect()->route('primes.index');
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
        $prime = Prime::findOrFail($id);
        $prime->delete();

        return redirect()->route('primes.index');
    }

        // Restore deleted item
        public function restore($id)
        {
    
            $prime = Prime::onlyTrashed()->findOrFail($id);
            $prime->restore();
    
            return redirect()->back();
        }
        
        // Delete item completely
        public function forceDelete($id)
        {
            
            $prime = Prime::onlyTrashed()->findOrFail($id);
            
            $prime->forceDelete();
    
            return redirect()->back();
        }
}
