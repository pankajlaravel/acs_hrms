<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;
use DB;
use PDF;

class InvoiceController extends Controller
{
    public function adminSalaryInvoice(){
        
        
        // $invoices = Invoice::latest()->paginate(10);
        $invoices = DB::table('invoices')
        ->join('clients','clients.id','=','invoices.client_id')
        ->select('invoices.*','clients.firstName as fname', 'clients.lastName as lname')
        ->latest()->get();
        // dd($invoices);
         return view('admin.invoice.list',compact('invoices'));
    }

    public function findClientName(Request $request){
        // dd($request->id);
        $client = Client::find($request->id);
        // dd($client);
        return response()->json($client);
    }

    public function adminSalaryInvoiceStore(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'client_id' => 'required|string|max:255',
            'project_id' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'tax' => 'nullable|max:255',
            'client_address' => 'nullable|max:255',
            'billing_address' => 'nullable|max:255',
            'invoice_date' => 'nullable|max:255',
            'due_date' => 'nullable|max:255',
            'item' => 'required|array',
            'description' => 'required|array',
            'unit_cost' => 'nullable|max:255',
            'qty' => 'required|array',
            'amount' => 'nullable|array',
            'total_amount' => 'nullable|max:255',
            'discount' => 'nullable|max:255',
            'tax_percentage' => 'nullable|max:255',
            'grand_total' => 'nullable|max:255',
            'other_info' => 'nullable',
            'status' => 'nullable',
            'invoice_id' => 'nullable|max:255',
        
        ]);

        $invoice = Invoice::create([
            'client_id' => $data['client_id'],
            'project_id' => $data['project_id'],
            'email' => $data['email'],
            'tax' => $data['tax'],
            'client_address' => $data['client_address'],
            'billing_address' => $data['billing_address'],
            'invoice_date' => $data['invoice_date'],
            'due_date' => $data['due_date'],
            'item' => json_encode($data['item']), // save as JSON
            'description' => json_encode($data['description']), // save as JSON
            'unit_cost' => json_encode($data['unit_cost']), // save as JSON
            'qty' => json_encode($data['qty']), // save as JSON
            'amount' => json_encode($data['amount']), // save as JSON
            'total_amount' => $data['total_amount'],
            'discount' => $data['discount'],
            'tax_percentage' => $data['tax_percentage'],
            'grand_total' => $data['grand_total'],
            'other_info' => $data['other_info'],
            'status' => $data['status'],
            'invoice_id' => $data['invoice_id'],
        ]);
        // $salary = Invoice::create($data);
        // return response()->json(['success'=>'Invoice added successfully...']);
        return response()->json([
            'success' => true,
            'message' => 'Invoice created successfully!',
            'invoice' => $invoice
        ]);
    }   

    public function adminSalaryCreateInvoice(){
        $clients = [];

           Client::chunk(100, function($clientsChunk) use (&$clients) {
                foreach ($clientsChunk as $client) {
                    // Collect the clients in an array to pass to the view later
                    $clients[] = [
                        'name' =>$client->firstName.' '.$client->lastName,
                        'id'    =>$client->id,
                    ];
                }
            });

        $projects = Project::latest()->get();
        $texes = Tax::latest()->get();
        $invoiceId = Invoice::generateSalaryInvoiceId();
            // dd($invoiceId);
        return view('admin.invoice.create',compact('clients','projects','invoiceId','texes'));
    
}

    public function adminSalaryInvoiceEdit($id)
    {   
        // dd($id);
        // $salary = Salary::findOrFail($id);

        
        $invoices = DB::table('invoices')
        ->join('clients','clients.id','=','invoices.client_id')
        ->select('invoices.*','clients.firstName as fname', 'clients.lastName as lname')
        ->where('invoices.id','=', $id)
        ->latest()->get();
        $clients = [];

           Client::chunk(100, function($clientsChunk) use (&$clients) {
                foreach ($clientsChunk as $client) {
                    // Collect the clients in an array to pass to the view later
                    $clients[] = [
                        'name' =>$client->firstName.' '.$client->lastName,
                        'id'    =>$client->id,
                    ];
                }
            });
        $projects = Project::latest()->get();
        // dd($invoices[0]->item);
        $items = json_decode($invoices[0]->item);
        $descriptions = json_decode($invoices[0]->description);
        $unit_costs = json_decode($invoices[0]->unit_cost);
        $qtys = json_decode($invoices[0]->qty);
        $amount = json_decode($invoices[0]->amount);
        $customArray = [];
    foreach ($items as $index => $item) {
        $customArray[] = [
            'item' => $item,
            'description' => $descriptions[$index],
            'unit_cost' => $unit_costs[$index],
            'qty' => $qtys[$index],
            'amount' => $amount[$index],
            'total_cost' => $unit_costs[$index] * $qtys[$index]
        ];
    }
        // dd($customArray); 
   
        $texes = Tax::latest()->get();
        return view('admin.invoice.edit',compact('invoices','projects','clients','customArray','texes'));
    }

    public function adminSalaryInvoiceUpdate(Request $request){
        // dd($request->all()); 
        $data = $request->validate([
            'client_id' => 'required|string|max:255',
            'project_id' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'tax' => 'nullable|max:255',
            'client_address' => 'nullable|max:255',
            'billing_address' => 'nullable|max:255',
            'invoice_date' => 'nullable|max:255',
            'due_date' => 'nullable|max:255',
            'item' => 'nullable|max:255',
            'description' => 'nullable',
            'unit_cost' => 'nullable|max:255',
            'qty' => 'nullable|max:255',
            'amount' => 'nullable|max:255',
            'total_amount' => 'nullable|max:255',
            'tax_percentage' => 'nullable|max:255',
            'discount' => 'nullable|max:255',
            'grand_total' => 'nullable|max:255',
            'other_info' => 'nullable',
            'status'=> 'nullable',
            'invoice_id' => 'nullable|max:255',
        ]);
        $invoice = Invoice::findOrFail($request->id);
        $invoice->update($data);
        return response()->json(['success'=>'Invoice updated successfully...']);
    }

    public function adminSalaryInvoiceDelete($id){
        $data = Invoice::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function adminSalarySlip(Request $request,$id){
        $salary = DB::table("salaries")
        ->join('users', 'salaries.emp_id', '=', 'users.id')
        ->join('designations', 'users.position', '=', 'designations.id')
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
        ->join('designations', 'users.position', '=', 'designations.id')
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

    public function generateInvoicePrintPDF($id){
        $invoice = DB::table('invoices')
        ->join('clients','clients.id','=','invoices.client_id')
        ->select('invoices.*',
        'clients.firstName as fname',
        'clients.lastName as lname',
        'clients.company_name as cname',
        'clients.address as address',
        'clients.email as email',
         )->where('invoices.id','=',$id)->get();
            $itemsArray = [];
            $items = json_decode($invoice[0]->item);
            $descriptions = json_decode($invoice[0]->description);
            $unit_costs = json_decode($invoice[0]->unit_cost);
            $qtys = json_decode($invoice[0]->qty);
            $amount = json_decode($invoice[0]->amount);
            foreach ($items as $index => $item) {
                $itemsArray[] = [
                    'item' => $item,
                    'description' => $descriptions[$index],
                    'unit_cost' => $unit_costs[$index],
                    'qty' => $qtys[$index],
                    'amount' => $amount[$index],
                    'total_cost' => $unit_costs[$index] * $qtys[$index]
                ];
            }

            $pdf = PDF::loadView('admin.invoice.invoice_print', compact('invoice'));

            return $pdf->download('invoice-' . $invoice[0]->invoice_id.'.pdf');
    }

    public function adminInvoiceView($id){
        $invoice = DB::table('invoices')
        ->join('clients','clients.id','=','invoices.client_id')
        ->select('invoices.*',
        'clients.firstName as fname',
        'clients.lastName as lname',
        'clients.company_name as cname',
        'clients.address as address',
        'clients.email as email',
         )->where('invoices.id','=',$id)->get();
            $itemsArray = [];
            $items = json_decode($invoice[0]->item);
            $descriptions = json_decode($invoice[0]->description);
            $unit_costs = json_decode($invoice[0]->unit_cost);
            $qtys = json_decode($invoice[0]->qty);
            $amount = json_decode($invoice[0]->amount);
            foreach ($items as $index => $item) {
                $itemsArray[] = [
                    'item' => $item,
                    'description' => $descriptions[$index],
                    'unit_cost' => $unit_costs[$index],
                    'qty' => $qtys[$index],
                    'amount' => $amount[$index],
                    'total_cost' => $unit_costs[$index] * $qtys[$index]
                ];
            }
            
        // dd($itemsArray);
        return view('admin.invoice.invoice_view',compact('invoice','itemsArray'));
    }

}