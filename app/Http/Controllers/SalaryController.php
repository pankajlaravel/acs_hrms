<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use PDF;
use App\Services\RazorpayService;
class SalaryController extends Controller
{

    protected $razorpay;

    public function __construct(RazorpayService $razorpayService)
    {
        $this->razorpay = $razorpayService;
    }

    public function getSendSalary($employeeId){
        // dd($employeeId);
        return view('payments.send_salary',compact('employeeId'));
    }
    public function sendSalary(Request $request, $employeeId)
    {
        // Validate incoming request
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // Fetch employee details
        $employee = User::findOrFail($employeeId);
        $amount = $request->input('amount'); // Amount to be sent
        $currency = 'INR'; // or any other currency

        try {
            // Create payment
            $payment = $this->razorpay->createPayment($amount, $currency, $employeeId);
            return response()->json(['payment' => $payment], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function adminSalary(){
        $salaries = Salary::latest()->paginate(10);
        $staff= DB::table("salaries")
        ->join('users', 'salaries.emp_id', '=', 'users.id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select('users.*', 'salaries.basic_salary as basic_salary','designations.name as work_role','salaries.id as primary_key')
        ->latest()
        ->get();
        $employees = User::all();
       
        // dd($invoiceId);
        return view('admin.salary.list',compact('salaries','employees','staff'));
    }
    
    public function adminSalaryStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required|string|max:255',
            'net_salary' => 'nullable|max:255',
            'basic_salary' => 'nullable|max:255',
            'tds' => 'nullable|max:255',
            'da' => 'nullable|max:255',
            'esi' => 'nullable|max:255',
            'hra' => 'nullable|max:255',
            'pf' => 'nullable|max:255',
            'allowance' => 'nullable|max:255',
            'prof_tax' => 'nullable|max:255',
            'medical_allowance' => 'nullable|max:255',
            'conveyance' => 'nullable|max:255',
            'leave' => 'nullable|max:255',
            'labour_welfare' => 'nullable|max:255',
            'other' => 'nullable|max:255',
            'invoice_id' => 'nullable|max:255',
        
        ]);
        $salary = Salary::create($data);
        return response()->json(['success'=>'Salary added successfully...']);
    }   

    public function adminSalaryEdit($id)
    {
        // $salary = Salary::findOrFail($id);
        $salary = DB::table('salaries')
        ->join('users','salaries.emp_id','=','users.id')
        ->select('salaries.*','users.firstName as emp_first_name',
                  'users.lastName as emp_last_name',
                )
                ->where('salaries.id', $id) // Filter by the specific ID
                ->first();
        // dd($salary);
        return response()->json($salary);
    }

    public function adminSalaryUpdate(Request $request){
        $data = $request->validate([
            'emp_id' => 'required|string|max:255',
            'net_salary' => 'nullable|max:255',
            'basic_salary' => 'nullable|max:255',
            'tds' => 'nullable|max:255',
            'da' => 'nullable|max:255',
            'esi' => 'nullable|max:255',
            'hra' => 'nullable|max:255',
            'pf' => 'nullable|max:255',
            'allowance' => 'nullable|max:255',
            'prof_tax' => 'nullable|max:255',
            'medical_allowance' => 'nullable|max:255',
            'conveyance' => 'nullable|max:255',
            'leave' => 'nullable|max:255',
            'labour_welfare' => 'nullable|max:255',
            'other' => 'nullable|max:255',
        ]);
        $salary = Salary::findOrFail($request->id);
        $salary->update($data);
        return response()->json(['success'=>'Salary updated successfully...']);
    }

    public function adminSalaryDelete($id){
        $data = Salary::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function adminSalarySlip(Request $request,$id){
        $salary = DB::table("salaries")
        ->join('users', 'salaries.emp_id', '=', 'users.id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select('users.firstName as fname',
                           'users.lastName as lname',
                           'users.employee_id as employeeID',
                           'users.joining_Date as joiningDate',
                             'salaries.*',
                             'designations.name as work_role',
                            )
        ->where('salaries.id', $id) // Filter by the specific ID
    ->first();

        // dd($salary);
        return view('admin.salary.view',compact('salary'));
    }

    public function generateSalarySlipPDF($id){
        // dd($id);
        $salary = DB::table("salaries")
        ->join('users', 'salaries.emp_id', '=', 'users.id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select('users.firstName as fname',
                           'users.lastName as lname',
                           'users.employee_id as employeeID',
                           'users.joining_Date as joiningDate',
                             'salaries.*',
                             'designations.name as work_role',
                            )
        ->where('salaries.id', $id) // Filter by the specific ID
    ->first();
    // dd($salary);
        $pdf = PDF::loadView('admin.salary.slip_invoive', compact('salary'));

        return $pdf->download('invoice-' . $salary->fname.''.$salary->lname . '.pdf');
    }

    public function adminSalaryInvoice(){
        dd('ok');
        return view('admin.salary.invoice');
}
}