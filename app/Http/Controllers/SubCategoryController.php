<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
class SubCategoryController extends Controller
{
    public function subCategoryList(){
        $category = Category::latest()->get();
        // $data = SubCategory::where('status','=',0)->orderBy('id','DESC')->get();
        $data = DB::table('sub_categories')
        ->join('categories','sub_categories.cat_id','=','categories.id')
        ->where('sub_categories.status','=',0)
        ->select('sub_categories.*','categories.name as catName')
        ->latest()->get();
        // dd($data);
        return view('admin.subCategory.list',[
            'data' => $data,
            'category' => $category
        ]);
    }

    public function subCategoryStore(Request $request){
        $data = $request->validate([
            'cat_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $subCategory = SubCategory::create($data);
        return response()->json(['success'=>'Category added successfully...']);
    }

    public function subCategoryEdit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        
        // dd($subCategory);
        return response()->json($subCategory);
    }

    public function subCategoryUpdate(Request $request){
        $data = $request->validate([
            'cat_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->update($data);
        return response()->json(['success'=>'category updated successfully...']);
    }

    public function subCategoryDelete($id){
        $data = SubCategory::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
