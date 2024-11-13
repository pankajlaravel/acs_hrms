<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function categoryList(){
        $data = Category::where('status','=',0)->orderBy('id','DESC')->get();
        return view('admin.category.list',[
            'data' => $data
        ]);
    }

    public function categoryStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::create($data);
        return response()->json(['success'=>'Category added successfully...']);
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        
        // dd($category);
        return response()->json($category);
    }

    public function categoryUpdate(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($request->id);
        $category->update($data);
        return response()->json(['success'=>'category updated successfully...']);
    }

    public function categoryDelete($id){
        $data = Category::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
