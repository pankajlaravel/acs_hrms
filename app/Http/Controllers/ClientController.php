<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DB;
use App\Models\Department;
use App\Models\Designation;

class ClientController extends Controller
{
    public function adminClient(){
        // $users = User::with('department')->get();
        $clients = DB::table('clients')->latest()->paginate(50);
    
        // dd($clients);
        $clientId = Client::generateClientId();
        // $employees = User::where('role', 'employee')->latest()->paginate(50);
        $department = Department::latest()->get();
        $designation = Designation::latest()->get();
        return view('admin.client.list',compact(
            'clientId',
            'clients',
                      'department',
                      'designation'
        ));
    }

    public function adminClientEdit($id)
    {
        $client = Client::findOrFail($id);
        
        // dd($client);
        return response()->json($client);
    }

    public function adminClientStore(Request $request){
        
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'client_id' => 'required|string|unique:clients',
            'company_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'nullable|numeric|digits:10',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        

        // Handle image upload
        if ($request->hasFile('picture')) {
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('clients/img/'), $filename);
            $data['picture'] = $filename;
        }
        $user = Client::create($data);
        return response()->json(['success'=>'Employee added successfully...']);
    
    }

    public function adminClientUpdate(Request $request) {
        // Fetch the existing user
        // dd($request->all());
        $user = Client::findOrFail($request->id);
    
        $data = $request->validate([
            'id' => 'required|integer|exists:clients,id',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'client_id' => 'required|string|unique:clients,client_id,' . $user->id,
            'phone' => 'nullable|numeric|digits:10',
            'company_name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $user->id,
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists (optional)
            if ($user->picture) {
                @unlink(public_path('clients/img/' . $user->picture));
            }
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('clients/img/'), $filename);
            $data['picture'] = $filename;
        }
    
        // Update the user with new data
        $user->update($data);
    
        return response()->json(['success' => 'Employee updated successfully...']);
    }

    public function adminClientDelete($id)
    {
        $data = Client::findOrFail($id);
        if ($id) {
            @unlink(public_path('clients/img/' . $$data->picture));
        }
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }
    
    public function ajaxSearch(Request $request)
    {
        // Validate input
        $request->validate([
            'client_id' => 'nullable|string',
            // 'employee_name' => 'nullable|string',
            // 'position' => 'nullable|string',
        ]);
    
        // Get the search inputs
        $client_id = $request->input('client_id');
        // $employeeName = $request->input('employee_name');
        // $designation = $request->input('position');
    
        // Build the query
        $query = Client::query();
    
        if ($client_id) {
            $query->where('client_id', $client_id);
        }
    
        // if ($employeeName) {
        //     $query->where('name', 'LIKE', '%' . $employeeName . '%');
        // }
    
        // if ($designation) {
        //     $query->where('position', $designation);
        // }
    
        // Execute the query
        $client_id = $query->get();
    
        // Return the results as a JSON response
        return response()->json($client_id);
    }

    public function adminClientView(Request $request,$id){
       $client = Client::findOrFail($id);
    //    dd($client);
        return view('admin.client.view',compact('client'));
    }
}
