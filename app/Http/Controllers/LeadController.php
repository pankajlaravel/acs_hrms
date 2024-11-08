<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use DB;

class LeadController extends Controller
{
    public function adminLead(){
        // $users = User::with('department')->get();
        $leads = DB::table('leads')->latest()->get();
   
        return view('admin.leads.list',compact('leads'));
    }

    public function adminLeadEdit($id)
    {
        $lead = Lead::findOrFail($id);
        
        // dd($client);
        return response()->json($lead);
    }

    public function adminLeadStore(Request $request){
        
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'nullable|numeric|digits:10',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        // dd($data);

        // Handle image upload
        if ($request->hasFile('picture')) {
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('leads/img/'), $filename);
            $data['picture'] = $filename;
        }
        $leads = Lead::create($data);
        return response()->json(['success'=>'Employee added successfully...']);
    
    }

    public function adminLeadUpdate(Request $request) {
        // Fetch the existing user
        // dd($request->all());
        $user = Lead::findOrFail($request->id);
    
        $data = $request->validate([
            'id' => 'required|integer|exists:leads,id',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'nullable|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:leads,email,' . $user->id,
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists (optional)
            if ($user->picture) {
                @unlink(public_path('leads/img/' . $user->picture));
            }
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('leads/img/'), $filename);
            $data['picture'] = $filename;
        }
    
        // Update the user with new data
        $user->update($data);
    
        return response()->json(['success' => 'Lead updated successfully...']);
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
       $client = Lead::findOrFail($id);
    //    dd($client);
        return view('admin.leads.view',compact('client'));
    }

    public function adminLeadDelete($id){
        $data = Lead::findOrFail($id);
        if ($id) {
            @unlink(public_path('leads/img/' . $$data->picture));
        }
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
