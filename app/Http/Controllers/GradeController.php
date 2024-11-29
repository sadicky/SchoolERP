<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Grades";
        $grades = Grade::all();
      return view('admin.grades.all',compact('grades', 'title')); 
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
    public function store(StoreGradeRequest $request)
    {
        Grade::create([ 
                'grade_name' => $request->grade_name,
                'salaireBase' => $request->salaireBase,
                'status' => '1']
            );
        
    session()->flash('message', $request->grade_name . ' Ajouté avec succes');
    return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Grade";
         
        $grades = Grade::findOrFail($id);
        return view('admin.grades.getid', compact('grades','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer la Grade";
       
        $grades = Grade::findOrFail($id);
        return view('admin.grades.edit', compact('grades','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, $id)
    {
        //
        $grades = Grade::findOrFail($id);

        $grades->update([
            'grade_name' => $request->grade_name,
            'salaireBase' => $request->salaireBase
        ]);

        session()->flash('message', $request->grade_name . ' a été modifié avec succes');
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $Grade)
    {
        //
    }
}
