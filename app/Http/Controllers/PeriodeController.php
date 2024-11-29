<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Périodes";
        // $periodes = Periode::with('Categories')->get(); 
        $periodes = DB::table('tbl_periodes as p')
                    ->join('tbl_category_options as c', 'c.category_option_id','=','p.category_option_id')
                    ->get();
        $categories = Category::all();

      return view('admin.periodes.periodes',compact('periodes','categories', 'title'));
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
    public function store(StorePeriodeRequest $request)
    {
        //
        // Periode::create([ 
        //     'periode_name' => $request->periode_name,
        //     'category_option_id' => $request->category_option_id,
        //     'status' => '1']);

            $input = $request->all();
            $data = [];
            if (is_array($input['category_option_id'])) {
                foreach ($input['category_option_id'] as $item) {
                    array_push($data, [
                        'periode_name' => $request->periode_name,
                        'category_option_id' => $item,
                        'status' => '1'
                    ]);
                }
            }

            Periode::insert($data);

        session()->flash('message', $request->periode_name . ' Ajouté avec succes');
        return redirect()->route('periodes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Périodes";
         
         $periodes = DB::table('tbl_periodes as p')
         ->join('tbl_category_options as c', 'c.category_option_id','=','p.category_option_id')
         ->where('p.periode_id', '=',$id)
         ->first();
        // $periodes = Periode::findOrFail($id);
        return view('admin.periodes.periodeid', compact('periodes','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        
        $categories = Category::all();
        $title = "Editer la periode";
        $periodes = DB::table('tbl_periodes as p')
         ->join('tbl_category_options as c', 'c.category_option_id','=','p.category_option_id')
         ->where('p.periode_id', '=',$id)
         ->first();
        
        return view('admin.periodes.periodeedit', compact('periodes','categories','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriodeRequest $request, $id)
    {
        //
        $periodes = Periode::findOrFail($id);

        $periodes->update([
            'periode_name' => $request->periode_name,
            'category_option_id' => $request->category_option_id
        ]);

        session()->flash('message', $request->periode_name . ' a été modifié avec succes');
        return redirect()->route('periodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
