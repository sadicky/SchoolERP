<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Category;
use App\Models\FraisCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Sections";
        
        $sections = DB::table('tbl_section as s')
                    ->join('tbl_category_options as c', 'c.category_option_id','=','s.category_option_id')
                    ->get();
        $categories = Category::all();

      return view('admin.sections.all',compact('sections','categories', 'title')); 
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
    public function store(StoreSectionRequest $request)
    {
        Section::create([ 
                'section_name' => $request->section_name,
                'category_option_id' => $request->category_option_id,
                'status' => '1']
            );
        
    session()->flash('message', $request->section_name . ' Ajouté avec succes');
    return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Section";
         
         $sections = DB::table('tbl_section as s')
         ->join('tbl_category_options as c', 'c.category_option_id','=','s.category_option_id')
         ->where('s.section_id', '=',$id)
         ->first();
        // $sections = section::findOrFail($id);
        return view('admin.sections.getid', compact('sections','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $title = "Editer la section";
        $sections = DB::table('tbl_section as p')
         ->join('tbl_category_options as c', 'c.category_option_id','=','p.category_option_id')
         ->where('p.section_id', '=',$id)
         ->first();
        
        return view('admin.sections.edit', compact('sections','categories','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, $id)
    {
        //
        $sections = Section::findOrFail($id);

        $sections->update([
            'section_name' => $request->section_name,
            'category_option_id' => $request->category_option_id
        ]);

        session()->flash('message', $request->section_name . ' a été modifié avec succes');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }

    
    public function get_inscription($section_id)
    {
        //
         $options = DB::table('tbl_category_frais as cf','montant')
         ->join('tbl_category_frais_option as cfo', 'cfo.category_frais_id','=','cf.category_frais_id')
         ->join('tbl_section as s', 's.section_id','=','cfo.category_option_id')
         ->where('cf.category_frais_id','=',3)
         ->where('s.section_id', '=',$section_id)
         ->get();
        if($options->isEmpty()){
            return response()->json(['message'=>'Aucun Frais Dispo'],404);
        }
        return response()->json($options);
    }
    public function get_periode($section_id)
    {
        //
         $periodes = DB::table('tbl_periodes as p')
         ->join('tbl_category_options as c', 'c.category_option_id','=','p.category_option_id')
         ->where('p.category_option_id', '=',$section_id)
         ->get();
        if($periodes->isEmpty()){
            return response()->json(['message'=>'Aucune Periode Dispo'],404);
        }
        return response()->json($periodes);
    }
}
