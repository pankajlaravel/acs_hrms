<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreviousEmployment;
use App\Models\Designation;
use Carbon\Carbon;
use DB;

class PreviousEmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designation = Designation::latest()->get();
        return view('admin.employee.previousEmployment.previousEmployment',[
            'designation' => $designation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function previousEmployeementGet(Request $request)
    {
        $query = $request->input('query');
        $empID = $query;
        $empInfo = DB::table('previous_employments')
        ->join('designations','previous_employments.designation_id','=','designations.id')
        ->select('previous_employments.*','designations.name as designationName')
        ->where('previous_employments.employee_id','=',$query)
        ->get()->map(function ($doc) {
            // Format the created_at field using Carbon
            if (!empty($doc->from_date)) {
                $doc->from_date = Carbon::parse($doc->from_date)
                    ->timezone('Asia/Kolkata')
                    ->format('d M Y');
            }
    
            if (!empty($doc->to_date)) {
                $doc->to_date = Carbon::parse($doc->to_date)
                    ->timezone('Asia/Kolkata')
                    ->format('d M Y');
            }
            return $doc;
        });
        // dd($empInfo);
        return response()->json([
            'empInfo' => $empInfo,
            'empID' => $empID,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function previousEmployeementPost(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'employee_id' => 'required',
            'company_name' => 'required|string|max:255',
            'designation_id' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'relevant_experience_in_year' => 'required|string|max:255',
            'relevant_experience_in_month' => 'required|string|max:255',
            'company_address' => 'nullable|string',
            'nature_of_duties' => 'nullable|string',
            'leaving_reason' => 'nullable|string',
        ]);
        $existingEmployeeDoc = PreviousEmployment::where('employee_id', $request->employee_id)
        ->where('designation_id', $request->designation_id)
        ->where('company_name', $request->company_name)
        ->first();
        if ($existingEmployeeDoc) {
            return response()->json([
                'status' => 'error',
                'message' => 'The designation name already exists for this employee.',
            ], 422); // 422 Unprocessable Entity for validation errors
        }
        $employee = PreviousEmployment::where('employee_id', $request->employee_id)->first();
        if ($existingEmployeeDoc) {
            // If the record with the same category exists, update the data
            $existingEmployeeDoc->company_name = $request->company_name;
            $existingEmployeeDoc->designation_id = $request->designation_id;
            $existingEmployeeDoc->from_date = $request->from_date;
            $existingEmployeeDoc->to_date = $request->to_date;
            $existingEmployeeDoc->relevant_experience_in_year = $request->relevant_experience_in_year;
            $existingEmployeeDoc->relevant_experience_in_month = $request->relevant_experience_in_month;
            $existingEmployeeDoc->company_address = $request->company_address;
            $existingEmployeeDoc->nature_of_duties = $request->nature_of_duties;
            $existingEmployeeDoc->leaving_reason = $request->leaving_reason;
              // Handle file upload
       
        $existingEmployeeDoc->update();
        $message = 'Document for the specified category updated successfully.';
    }else {
        // If the record with the same category does not exist, create a new record
            
            $employee = PreviousEmployment::create([
                'employee_id' => $request->employee_id,
                'company_name' => $request->company_name,
                'designation_id' => $request->designation_id,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'relevant_experience_in_year' => $request->relevant_experience_in_year,
                'relevant_experience_in_month' => $request->relevant_experience_in_month,
                'company_address' => $request->company_address,
                'nature_of_duties' => $request->nature_of_duties,
                'leaving_reason' => $request->leaving_reason,
            ]);
            $message = 'New record created for the specified category.';
        }
        return response()->json(['status' => 'success', 'message' => 'Record save successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function previousemployeementDelete(string $id)
    {
        $data = PreviousEmployment::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function previousemployeementEdit($id)
    {
        $data = PreviousEmployment::findOrFail($id);
        
        // dd($data);
        return response()->json($data);
    }

    public function previousemployeementdate(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'employee_id' => 'required',
            'company_name' => 'required|string|max:255',
            'designation_id' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'relevant_experience_in_year' => 'required|string|max:255',
            'relevant_experience_in_month' => 'required|string|max:255',
            'company_address' => 'nullable|string',
            'nature_of_duties' => 'nullable|string',
            'leaving_reason' => 'nullable|string',
        ]);
        $empData = PreviousEmployment::findOrFail($request->id);
        $empData->update($data);
        return response()->json(['success'=>'Data updated successfully...']);
    }
}
