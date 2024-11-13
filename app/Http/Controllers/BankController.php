<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Branch;
class BankController extends Controller
{
    public function bankList(){
        $data = Bank::where('status','=',0)->orderBy('id','DESC')->get();
        return view('admin.bank.list',[
            'data' => $data
        ]);
    }

    public function bankStore(Request $request){
        $data = $request->validate([
            'bank_name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
        ]);
        $category = Bank::create($data);
        return response()->json(['success'=>'Bank added successfully...']);
    }

    public function bankEdit($id)
    {
        $category = Bank::findOrFail($id);
        
        // dd($category);
        return response()->json($category);
    }

    public function bankUpdate(Request $request){
        $data = $request->validate([
            'bank_name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
        ]);
        $category = Bank::findOrFail($request->id);
        $category->update($data);
        return response()->json(['success'=>'Bank updated successfully...']);
    }

    public function bankDelete($id){
        $data = Bank::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    // Branch
    public function bankBranchList(){
        // $data = Branch::where('status','=',0)->orderBy('id','DESC')->get();
        $data = Branch::with('bank')->where('status', 0)->orderBy('id', 'DESC')->get();
        // dd($data[0]->bank->bank_name);
        $bank = Bank::where('status','=',0)->orderBy('id','DESC')->get();
        return view('admin.branch.list',[
            'data' => $data,
            'bank' => $bank
        ]);
    }

    public function bankBranchStore(Request $request){
        $data = $request->validate([
            'bank_id' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
        ]);
        $branch = Branch::create($data);
        return response()->json(['success'=>'Branch added successfully...']);
    }

    public function bankBranchEdit($id)
    {
        // $branch = Branch::findOrFail($id);
        $branch = Branch::with('bank')->findOrFail($id);
        
        // dd($branch);
        return response()->json($branch);
    }

    public function bankBranchUpdate(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'bank_id' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
        ]);
        $branch = Branch::findOrFail($request->id);
        $branch->update($data);
        return response()->json(['success'=>'Branch updated successfully...']);
    }

    public function bankBranchDelete($id){
        $data = Branch::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

}
