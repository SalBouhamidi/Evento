<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Event;



class CategorieController extends Controller
{
    public function index()
    {
        $categories= Categorie::all();
        // dd($categories);
        return view('dashboardcategory', compact('categories'));
    }


    public function update($id, Request $request){

        $findCategory= Categorie::find($id);
        $findCategory->name = $request->category;
        $findCategory->save();
        return redirect()->route('index');
    }
 
   
    public function destroy(string $id)
    {
        $findCategory = Categorie::find($id);
        $findCategory->delete();
        return redirect()->back();
    }
}
