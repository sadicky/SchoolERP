<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CatFrais;
use Illuminate\Http\Request;
use App\Models\FraisCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCatFraisRequest;
use App\Http\Requests\UpdateCatFraisRequest;

class CatFraisController extends Controller
{
    /**
     * Display a listing of the resource.
     * */
   public function index()
    {
        //
        $title = "Categories Frais";
        $categories_frais = CatFrais::all();
      return view('admin.categories_frais.all',compact('categories_frais', 'title')); 
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
    public function store(StoreCatFraisRequest $request)
    {
        CatFrais::create([ 
                'category_name' => $request->category_name,
                'status' => '1']
            );
        
    session()->flash('message', $request->category_name . ' Ajouté avec succes');
    return redirect()->route('categories_frais.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $title = "Détail de la Categorie de Frais";
         
        $categories_frais = CatFrais::findOrFail($id);
        $categories_frais_option = DB::table('tbl_category_frais_option as c')
        ->join('tbl_category_options as o', 'o.category_option_id','=','c.category_option_id')
        ->join('tbl_category_frais as f', 'f.category_frais_id','=','c.category_frais_id')
        ->where('f.category_frais_id', '=',$id)
        ->get();
        $categories = Category::all();
        return view('admin.categories_frais.getid', compact('categories_frais_option','categories_frais','categories','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Editer la CatFrais";
       
        $categories_frais = CatFrais::findOrFail($id);

        return view('admin.categories_frais.edit', compact('categories_frais','title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatFraisRequest $request, $id)
    {
        //
        $categories_frais = CatFrais::findOrFail($id);

        $categories_frais->update([
            'category_name' => $request->category_name
        ]);

        session()->flash('message', $request->category_name . ' a été modifié avec succes');
        return redirect()->route('categories_frais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatFrais $CatFrais)
    {
        //
    }

    public function affect_option(Request $request, $id)
    {
        //
        $input = $request->all();
        $data = [];
        if (is_array($input['category_option_id'])) {
            foreach ($input['category_option_id'] as $item) {
                array_push($data, [ 
                    'category_frais_id' => $request->category_frais_id,
                    'category_option_id' => $item,
                    'montant'           => $request->montant,
                    'status' => '1'
                ]);
            }
        }

        FraisCategory::insert($data);

        session()->flash('message', $request->montant . ' a été affecté avec succes');
        return redirect()->route('categories_frais.index');
    }
}

