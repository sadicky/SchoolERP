<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Classe;
use App\Models\Section;
use App\Models\CoursClasse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCoursRequest;
use App\Http\Requests\UpdateCoursRequest;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Cours";
        $cours = Cours::all();
        // $options = Option::all();
        // $Courss = DB::table('tbl_Courss as c')
        // ->join('tbl_options as o', 'o.option_id','=','c.option_id')
        // ->join('tbl_section as s', 's.section_id','=','o.section_id')
        // ->get();
        return view('admin.cours.all',compact('cours', 'title')); 
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
    public function store(StoreCoursRequest $request)
    {  
        Cours::create([
            'cours_name' => $request->cours_name,'manuel'=>$request->manuel, 'status' => '1']);
            session()->flash('message', $request->cours_name . ' Ajouté avec succes');
            return redirect()->route('cours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $title = "Détail du cours";
        $cours = Cours::findOrFail($id);
        $coursClasses = DB::table('tbl_cours as c')
        ->join('tbl_cours_classes as cc', 'cc.cours_id','=','c.cours_id')
        ->join('tbl_classes as cl', 'cl.classe_id','=','cc.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('c.cours_id', '=',$id)
        ->get();
        return view('admin.cours.getid', compact('coursClasses','cours','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer le cours";
       
        $cours = Cours::findOrFail($id);

        return view('admin.cours.edit', compact('cours','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursRequest $request, $id)
    {
        //
        $cours = Cours::findOrFail($id);

        $cours->update([
            'cours_name' => $request->cours_name
        ]);

        session()->flash('message', $request->cours_name . ' a été modifié avec succes');
        return redirect()->route('cours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $Cours)
    {
        //
    }

    public function affect_classes($id)
    {
        //
        $title = "";
        $cours = Cours::findOrFail($id);
        $title = $cours->cous_name;
        $sections = Section::all();
        $coursClasses = DB::table('tbl_cours as c')
        ->join('tbl_cours_classes as cc', 'cc.cours_id','=','c.cours_id')
        ->join('tbl_classes as cl', 'cl.classe_id','=','cc.classe_id')
        ->join('tbl_options as o', 'o.option_id','=','cl.option_id')
        ->join('tbl_section as s', 's.section_id','=','o.section_id')
        ->where('c.cours_id', '=',$id)
        ->get();
        return view('admin.cours.affecter',compact('sections','coursClasses','cours','title'));
    }
    public function get_classes($option_id)
    {
        //
        $classes = Classe::where('option_id', $option_id)->get();
        if($classes->isEmpty()){
            return response()->json(['message'=>'Aucune Option disponible pour cette section'],404);
        }
        return response()->json($classes);
    }
    public function affect_cours_classe(Request $request)
    {
        //
        $input = $request->all();
        $data = [];
        if (is_array($input['classe_id'])) {
            foreach ($input['classe_id'] as $item) {
                array_push($data, [ 
                    'cours_id'    => $request->cours_id,
                    'classe_id'   => $item,
                    'ponderation' => $request->ponderation,
                    'status' => '1'
                ]);
            }
        }
        CoursClasse::insert($data);

        session()->flash('message',$request->cours.' a été affecté avec succes');
        return redirect()->route('get_classes',$request->cours_id);
    }
}

