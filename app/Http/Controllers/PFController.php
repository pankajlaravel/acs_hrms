<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\PF;
use App\Models\User;
class PFController extends Controller
{
    public function adminPF(){
        $pfs = PF::latest()->get();
        $getPF = DB::table("p_f_s")
        ->join("users","p_f_s.emp_id","=","users.id")
        ->join("designations","users.designation_id","=","designations.id")
        ->select('p_f_s.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture',
        'designations.name as work_role'
        )->orderBy('p_f_s.id', 'DESC')->get();
        // dd($getPF);
        $employees = User::latest()->where('role','=','employee')->get();
        return view('admin.PF.list',compact('getPF','employees'));
    }
    
    public function adminPFStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required',
            'pf_type' => 'required',
            'emp_share_amt' => 'required',
            'org_share_amt' => 'required',
            'emp_share_persant' => 'required',
            'org_share_persant' => 'required',
            'description' => 'required',
        ]);
        $pfs = PF::create($data);
        return response()->json(['success'=>'PF  added successfully...']);
    }   

    public function adminPFEdit($id)
    {
        // $pfs = PF::findOrFail($id);
        $getPF = DB::table("p_f_s")
        ->join("users","p_f_s.emp_id","=","users.id")
        ->join("designations","users.designation_id","=","designations.id")
        ->select('p_f_s.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture',
        'designations.name as work_role'
        )
        ->where('p_f_s.id', $id)->first();
        // dd($getPF);
        return response()->json($getPF);
    }

    public function adminPFUpdate(Request $request){
        $data = $request->validate([
            'emp_id' => 'required',
            'pf_type' => 'required',
            'emp_share_amt' => 'required',
            'org_share_amt' => 'required',
            'emp_share_persant' => 'required',
            'org_share_persant' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $pfs = PF::findOrFail($request->id);
        $pfs->update($data);
        return response()->json(['success'=>'PF updated successfully...']);
    }

    public function adminPFDelete($id){
        $data = PF::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
