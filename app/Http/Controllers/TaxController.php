<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function adminTax(){
        $taxes = Tax::latest()->get();
        return view('admin.taxes.list',compact('taxes'));
    }
    
    public function adminTaxStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|string|max:255',
        ]);
        $tax = Tax::create($data);
        return response()->json(['success'=>'Holiday added successfully...']);
    }   

    public function adminTaxEdit($id)
    {
        $tax = Tax::findOrFail($id);
        
        // dd($tax);
        return response()->json($tax);
    }

    public function adminTaxUpdate(Request $request){
        // dd($request->all()); 
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);
        $tax = Tax::findOrFail($request->id);
        $tax->update($data);
        return response()->json(['success'=>'Holiday updated successfully...']);
    }

    public function adminTaxDelete($id){
        $data = Tax::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function adminTaxFind(Request $request){
        // dd($request->id);
        $taxes = Tax::find($request->id);
        // dd($taxes);
        return response()->json($taxes);
    }

    
}
