<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpBank;
use App\Models\Branch;
use App\Models\Bank;
use DB;

class EmpBankController extends Controller
{
    public function empBankDetail(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'employee_id' => 'required',
            'bank_id' => 'required',
            'bank_branch_id' => 'required',
            'account_no' => 'required',
            'account_type' => 'required',
            'payment_type' => 'required',
            'account_holder_name' => 'required',
        ]);
        // dd($data);

        EmpBank::create($data);
        return response()->json(['success'=>'Bank Details added successfully...']);
    }

    public function getBranches($bank_id)
    {
        $branches = Branch::where('bank_id', $bank_id)->get();
        // dd($branches);
        return response()->json($branches);
    }

    public function employeeBankDetailsEdit($id){
        $bankRecord  = DB::table('emp_banks')
                    ->join('users', 'emp_banks.employee_id', '=', 'users.employee_id') // Joining the designations table
                    ->join('banks','emp_banks.bank_id','=','banks.id')
                    ->join('branches','emp_banks.bank_branch_id','=','branches.id')
                    ->select('emp_banks.*','branches.branch_name as branchName','banks.bank_name as bankName','branches.ifsc as ifsc') // Selecting columns from users and designations
                    ->where('emp_banks.id', $id) // Check if query is a user ID
                    ->first();
                    // dd($bankRecord);
                    return response()->json($bankRecord);
    }

    public function empBankDetailUpdate(Request $request){
        // dd($request->all());
        $validated = $request->validate([
           'employee_id' => 'required',
            'bank_id' => 'required',
            'bank_branch_id' => 'required',
            'account_no' => 'required',
            'account_type' => 'required',
            'payment_type' => 'required',
            'account_holder_name' => 'required',
        ]);

        $data = EmpBank::findOrFail($request->id);
        $data->update($validated);
        return response()->json(['success' => true]);
    }
}
