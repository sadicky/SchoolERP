<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Section;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Options";
        
        $options = DB::table('tbl_options as o')
                    ->join('tbl_section as s', 's.section_id','=','o.section_id')
                    ->get();

        $sections = Section::all();

      return view('admin.options.all',compact('options','sections', 'title')); 
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
    public function store(StoreOptionRequest $request)
    {
        Option::create([ 
                'option_name' => $request->option_name,
                'section_id' => $request->section_id,
                'status' => '1']
            );
        
    session()->flash('message', $request->option_name . ' Ajouté avec succes');
    return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Option";
         
         $options = DB::table('tbl_options as s')
         ->join('tbl_section as c', 'c.section_id','=','s.section_id')
         ->where('s.option_id', '=',$id)
         ->first();
        // $options = Option::findOrFail($id);
        return view('admin.options.getid', compact('options','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $sections = Section::all();
        $title = "Editer l'option";
        $options = DB::table('tbl_options as p')
         ->join('tbl_section as c', 'c.section_id','=','p.section_id')
         ->where('p.option_id', '=',$id)
         ->first();
        
        return view('admin.options.edit', compact('options','sections','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, $id)
    {
        //
        $options = Option::findOrFail($id);

        $options->update([
            'option_name' => $request->option_name,
            'section_id' => $request->section_id
        ]);

        session()->flash('message', $request->option_name . ' a été modifié avec succes');
        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $Option)
    {
        //
    }
}
