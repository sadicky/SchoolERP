<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Option;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //
        $title = "Classes";
        $sections = Section::all(); 
        $options = Option::all();
        $classes = DB::table('tbl_classes as c')
        ->join('tbl_options as o', 'o.option_id','=','c.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->get();
        return view('admin.classes.all',compact('classes','options','sections', 'title')); 
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
    public function store(StoreClasseRequest $request)
    {
            $input = $request->all();
            $data = [];
            if (is_array($input['option_id'])) {
                foreach ($input['option_id'] as $item) {
                    array_push($data, [
                        'classe_name' => $request->classe_name,
                        'option_id' => $item,
                        'status' => '1'
                    ]);
                }
            }

            Classe::insert($data);

    session()->flash('message', $request->classe_name . ' Ajouté avec succes');
    return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Classe";
         $classes = DB::table('tbl_classes as c')
         ->join('tbl_options as o', 'o.option_id','=','c.option_id')
         ->join('tbl_section as s', 's.section_id','=','o.section_id')
         ->join('tbl_category_options as co', 'co.category_option_id','=','s.category_option_id')
         ->where('c.classe_id', '=',$id)
         ->first();
        $categories = classe::all();
        return view('admin.classes.getid', compact('classes','categories','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer la Classe";
       
        $classes = Classe::findOrFail($id);

        return view('admin.classes.edit', compact('classes','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, $id)
    {
        //
        $classes = Classe::findOrFail($id);

        $classes->update([
            'classe_name' => $request->classe_name
        ]);

        session()->flash('message', $request->classe_name . ' a été modifié avec succes');
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $Classe)
    {
        //
    }

    public function get_options($section_id)
    {
        //
        $options = Option::where('section_id', $section_id)->get();
        if($options->isEmpty()){
            return response()->json(['message'=>'Aucune Option disponible pour cette section'],404);
        }
        return response()->json($options);
    }

    public function get_cours($classe_id)
    {
        //
        $cours = DB::table('tbl_cours as c')
        ->join('tbl_cours_classes as cc', 'cc.cours_id','=','c.cours_id')
        ->join('tbl_classes as cl', 'cl.classe_id','=','cc.classe_id')
        ->where('cl.classe_id', '=',$classe_id)
        ->get();
        if($cours->isEmpty()){
            return response()->json(['message'=>'Aucun cours disponible pour cette classe'],404);
        }
        return response()->json($cours);
    }
}

