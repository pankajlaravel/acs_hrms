<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    // Employee Listing on admin dashboard
    public function adminEmployee(){
        // $users = User::with('department')->get();
        $employees = DB::table('users')
    ->join('designations', 'users.designation_id', '=', 'designations.id')
    ->select('users.*', 'designations.name as designations_name')
    ->where('role', 'employee')
    ->latest()
    ->get();
    
        // dd($usersArray);
        $employeeId = User::generateEmployeeId();
        // $employees = User::where('role', 'employee')->latest()->paginate(50);
        $department = Department::latest()->get();
        $designation = Designation::latest()->get();
        return view('admin.employee.list',compact(
            'employeeId',
            'employees',
                      'department',
                      'designation'
        ));
    }

    public function employeeInfoEdit($id)
    {
        // $employee = User::findOrFail($id);
        $employee = DB::table("users")
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select(   'users.*',
                             'designations.name as work_role',
                             'departments.name as departmentName'
                            )
        ->where('users.id', $id) // Filter by the specific ID
    ->first();
        // dd($employee);
        return response()->json($employee);
    }

    public function adminEmployeeStore(Request $request){
        
        $emp_id = IdGenerator::generate([
            'table' => 'users', // The table to check for existing IDs
            'length' => 9,      // Total length of the ID
            'prefix' => 'EMP-',   // Prefix (optional)
            'field' => 'employee_id'  // The field where the ID is stored
        ]);
        // dd($emp_id);
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'username' => 'nullable|string|unique:users,username,',
            'email' => 'nullable|string|email|max:255|unique:users,email,',
            'phone' => 'nullable|numeric|digits:10',
            'dob' => 'nullable|max:255',
            'birth_day' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'marital_date' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'residential_status' => 'nullable|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'physically_challened' => 'nullable|string|max:255',
            'is_director' => 'nullable|string|max:255',
            'personal_email' => 'nullable|string|max:255',
            'joining_Date' => 'nullable|string|max:255',
            'join_confrimation_date' => 'nullable|string|max:255',
            'joining_status' => 'nullable|string|max:255',
            'probation_period' => 'nullable|string|max:255',
            'notice_period' => 'nullable|string|max:255',
            'current_company_experience' => 'nullable|string|max:255',
            'pre_company_experiecne' => 'nullable|string|max:255',
            'total_experience' => 'nullable|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'pin' => 'nullable|string|max:255',
            'phone1' => 'nullable|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'fax' => 'nullable|string|max:255',
            'division' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'reporting' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'attendance_marking_option' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
        ]);
        
        // Hash the password
        $data['password'] = Hash::make($data['password']);

        // Handle image upload
            if ($request->hasFile('picture')) {
                $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
                $request->file('picture')->move(public_path('employee/img/'), $filename);
                $data['picture'] = $filename;
            }
        $data['employee_id'] = $emp_id;  
        $user = User::create($data);
        return response()->json(['success'=>'Employee added successfully...']);
    
    }

    public function updatePersonalInfo(Request $request)
    {
        $validated = $request->validate([
            'dob' => 'required',
            'blood_group' => 'required',
            'father_name' => 'required',
            // Add other validation rules here
        ]);

        $employee = User::findOrFail($request->id);
        $employee->update($validated);

        return response()->json(['success' => true]);
    }

    public function updateJoiningInfo(Request $request)
    {
        $validated = $request->validate([
            'joining_Date' => 'required',
            'join_confrimation_date' => 'required',
            'joining_status' => 'required',
            // Add other validation rules here
        ]);

        $employee = User::findOrFail($request->id);
        $employee->update($validated);

        return response()->json(['success' => true]);
    }

    public function employeeInfoUpdate(Request $request) {
        // Fetch the existing user
        // dd($request->all());
        $user = User::findOrFail($request->id);
        // dd($user);
        $data = $request->validate([
            'id' => 'required|integer|exists:users,id',
            'title' => 'nullable|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'username' => 'nullable|string|unique:users,username,' . $user->id,
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|numeric|digits:10',
            'dob' => 'nullable|max:255',
            'birth_day' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'marital_date' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'residential_status' => 'nullable|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'physically_challened' => 'nullable|string|max:255',
            'is_director' => 'nullable|string|max:255',
            'personal_email' => 'nullable|string|max:255',
            'joining_Date' => 'nullable|string|max:255',
            'join_confrimation_date' => 'nullable|string|max:255',
            'joining_status' => 'nullable|string|max:255',
            'probation_period' => 'nullable|string|max:255',
            'notice_period' => 'nullable|string|max:255',
            'current_company_experience' => 'nullable|string|max:255',
            'pre_company_experiecne' => 'nullable|string|max:255',
            'total_experience' => 'nullable|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'pin' => 'nullable|string|max:255',
            'phone1' => 'nullable|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'fax' => 'nullable|string|max:255',
            'division' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'reporting' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'attendance_marking_option' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            
            
        ]);
    
        $user->update($data);
    
        return response()->json(['success' => 'Employee updated successfully...']);
    }

    public function adminEmployeeDelete($id)
    {
        $data = User::findOrFail($id);
        if ($id) {
            @unlink(public_path('employee/img/' . $$data->picture));
        }
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }
    
    public function ajaxSearch(Request $request)
{
    // Validate input
    $query = $request->input('query');
    // dd($query);
    $results = DB::table('users')
    ->join('designations', 'users.designation_id', '=', 'designations.id') // Joining the designations table
    ->join('departments','users.department_id','=', 'departments.id')
    ->select('users.*', 'designations.name as position_name','departments.name as departmentName') // Selecting columns from users and designations
    ->where('users.employee_id', $query) // Check if query is a user ID
    ->get();
    // Return the results as a JSON response
    return response()->json($results);
}

public function searchFamilyDetails(Request $request){
    $query = $request->input('query');
    $request->session()->put('emp_id', $query);
    $results = DB::table('families')->where('emp_id','=',$query)->get();
    // dd($results);
    return response()->json($results);
}

public function adminNameList(Request $request){
         $query = $request->get('query');
        $items = User::where('firstName', 'LIKE', $query.'%')
                ->orWhere('lastName','LIKE', $query. '%')
                ->get();

        // $items = User::select(
        //     DB::raw("CONCAT(firstName, ' ', lastName)")
        // )
        // ->where(DB::raw("CONCAT(firstName, ' ', lastName as fullName)"), 'LIKE', $query.'%')
        // ->get();
        // dd($items);
        return response()->json($items);
}

public function adminEmployeeView(Request $request,$id){
    // $employee = User::findOrFail($id);   
    $employee = DB::table('users')
    ->join('designations', 'users.position', '=', 'designations.id')
    ->join('departments', 'users.department', '=', 'departments.id')
    ->select('users.*', 'designations.name as designations_name','departments.name as departments_name')
    ->where('users.id', $id) // Filter by the specific ID
    ->first();

    // dd($employeeData);
    return view('admin.employee.view',compact('employee'));

}

public function adminInfoProfile(Request $request){
    $department = Department::latest()->get();
    $designation = Designation::latest()->get();
    $user_data = User::latest()->first();
    $emp_id = IdGenerator::generate([
        'table' => 'users', // The table to check for existing IDs
        'length' => 9,      // Total length of the ID
        'prefix' => 'EMP-',   // Prefix (optional)
        'field' => 'employee_id'  // The field where the ID is stored
    ]);
    // dd($emp_id);
    // dd($user_data);
    $employee = $request->session()->get('employee');
    // $request->session()->forget('employee');
    // dd($employee);
    return view('admin.employee.profile_info',compact(
        'department',
        'designation',
        'user_data',
        'employee',
    ));
}

public function adminFamilyDetails(Request $request){
    $employee_id = $request->session()->get('emp_id');
    // dd($employee_id);
    return view('admin.employee.family_details',compact('employee_id'));
}

public function adminInfoProfileStore(Request $request,$id = null){    
    // dd($request->all()); 
       
    $validatedData = $request->validate([
            'employee_id' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'username' => 'nullable|string|unique:users,username,',
            'email' => 'nullable|string|email|max:255|unique:users,email,',
            'phone' => 'nullable|numeric|digits:10',
            'password' => 'nullable|string|max:255',
            
    ]);
    $validatedData['password'] = Hash::make($validatedData['password']);
    // $employee = User::create($validatedData);
    if(empty($request->session()->get('employee'))){
        $employee = new User();
        $employee->fill($validatedData);
        $request->session()->put('employee', $employee);
    }else{
        $employee = $request->session()->get('employee');
        $employee->fill($validatedData);
        $request->session()->put('employee', $employee);
    }
    return response()->json(['success' => true, 'employee_id' => $employee->id]);

}

public function storePersonalInfo(Request $request)
{
    // Validate and update personal information
    // dd($request->all() );
    $validatedData = $request->validate([
        'dob' => 'nullable|max:255',
            'birth_day' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'marital_date' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'residential_status' => 'nullable|string|max:255',
            'place_of_birth' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'physically_challened' => 'nullable|string|max:255',
            'is_director' => 'nullable|string|max:255',
            'personal_email' => 'nullable|string|max:255',
    ]);

    // Update employee record with personal information
    // $employee = User::findOrFail($request->id);
    // $employee->update($validatedData);
        $employee = $request->session()->get('employee');
        $employee->fill($validatedData);
        $request->session()->put('employee', $employee);   

    return response()->json(['success' => true]);
}

public function storeJoiningInfo(Request $request){
    $validatedData = $request->validate([
        'joining_Date' => 'nullable|string|max:255',
        'join_confrimation_date' => 'nullable|string|max:255',
        'joining_status' => 'nullable|string|max:255',
        'probation_period' => 'nullable|string|max:255',
        'notice_period' => 'nullable|string|max:255',
        'current_company_experience' => 'nullable|string|max:255',
        'pre_company_experiecne' => 'nullable|string|max:255',
        'total_experience' => 'nullable|string|max:255',
        'referred_by' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
    ]);
        $employee = $request->session()->get('employee');
        $employee->fill($validatedData);
        $request->session()->put('employee', $employee); 
        return response()->json(['success' => true]);
}

public function storePositionInfo(Request $request){
    $validatedData = $request->validate([
        'division' => 'nullable|string|max:255',
        'grade' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'reporting' => 'nullable|string|max:255',
        
        'attendance_marking_option' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
        'department' => 'nullable|string|max:255',
        
    ]);
        $employee = $request->session()->get('employee');
        $employee->fill($validatedData);
        $request->session()->put('employee', $employee); 
        return response()->json(['success' => true]);
}

public function storeAddressInfo(Request $request){
    $validatedData = $request->validate([
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'pin' => 'nullable|string|max:255',
        'phone1' => 'nullable|string|max:255',
        'phone2' => 'nullable|string|max:255',
        'fax' => 'nullable|string|max:255',
    ]);
        $employee = $request->session()->get('employee');
        $employee->fill($validatedData);
        $employee->save();
        $request->session()->forget('employee');
        return response()->json(['success' => true]);
}

}