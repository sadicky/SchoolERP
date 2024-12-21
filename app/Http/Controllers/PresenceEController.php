<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\PresenceE;
use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StorePresenceERequest;
use App\Http\Requests\UpdatePresenceERequest;

class PresenceEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Fiche de Présences";
        $sections = Section::all();
        $annees = AnneeScolaire::where('statut', '1')
            ->orderBy('annee_id', 'desc')
            ->limit(1)
            ->get();


        return view('admin.presencee.all', compact('annees', 'title', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Fiche de Présences";
        $sections = Section::all();
        $annees = AnneeScolaire::where('statut', '1')
            ->orderBy('annee_id', 'desc')
            ->limit(1)
            ->get();


        return view('admin.presencee.create', compact('annees', 'title', 'sections'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'classe_id' => 'required'
        ]);

        $title = "Fiche de Cotation";
        $sections = Section::all();

        $classe = $request->input('classe_id');
        $month = $request->input('month');

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

        return view('admin.presencee.create', compact('month', 'sections', 'annees', 'eleves', 'title', 'classe'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'classe_id' => 'required'
        ]);

        $title = "Fiche de Cotation";
        $sections = Section::all();

        $classe = $request->input('classe_id');
        $month = $request->input('month');

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

        return view('admin.presencee.all', compact('month', 'sections', 'annees', 'eleves', 'title', 'classe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $classe)
    {
        $validatedData = $request->validate([
            'eleve_id' => 'required|array',
            'eleve_id.*' => 'required|integer',
            'presence' => 'array',
            'presence.*.presence' => 'required|in:0,1',
            'presence.*.motif' => 'nullable|string|max:255',
            'date_presence' => 'required|date',
            'justify' => 'string|max:255',
        ]);

       

        $data = $request->input('presences');
        $date = $request->input('date_presence');
        $justify = $request->input('justify');

        $presences = [];
        foreach ($data as $eleveId => $presenceData) {
            
            $presences[] = [
                'eleve_id'      => $eleveId,
                'classe_id'     => $classe,
                'presence'      => isset($presenceData['presence']) ? true : false,
                'motif'         => $presenceData['motif'] ?? null,
                'justify'       => isset($presenceData['justify']) ? true : false,
                'date_presence' => $date,
            ];
            
        }
        PresenceE::insert($presences);
        session()->flash('message', ' Présence Ajoutée avec succes');
        return redirect()->route('presencee.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(PresenceE $presenceE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PresenceE $presenceE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresenceERequest $request, PresenceE $presenceE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PresenceE $presenceE)
    {
        //
    }
}
