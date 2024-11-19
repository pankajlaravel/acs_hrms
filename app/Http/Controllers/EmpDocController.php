<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Models\EmpDoc;
use Illuminate\Support\Facades\Storage;
class EmpDocController extends Controller
{
    public function employeeDoc(Request $request){
        $docType = $request->get('type');
        // dd($docType)
        return view('admin.employee.document.empDoc');
    }
    
    public function employeeGetDoc(Request $request){
        $query = $request->input('query');
        $empID = $query;
        $empDoc = DB::table('users')
        ->join('emp_docs','users.employee_id','=','emp_docs.employee_id')
        ->select('users.firstName','emp_docs.*')
        ->where('users.employee_id','=',$query)
        ->get()->map(function ($doc) {
            // Format the created_at field using Carbon
            $doc->formatted_date = Carbon::parse($doc->created_at)->timezone('Asia/Kolkata')->format('d M Y h:i:s A');
            return $doc;
        });
        // dd($empDoc);
        return response()->json([
            'empDoc' => $empDoc,
            'empID' => $empID,
        ]);

    }

    public function employeePostDoc(Request $request){
        // dd($request->all());
        // Validate the input
        $request->validate([
            // 'employee_id' => 'required|exists:e_s_i_s,employees,id',
            'employee_id' => 'required',
            'doc_name' => 'required|string|max:20',
            'category' => 'required|string|max:20',
            'description' => 'nullable|string|max:20',
            'isActive' => 'nullable|string|max:20',
            'file' => 'nullable|file|max:2048',
        ]);

        $existingEmployeeDoc = EmpDoc::where('employee_id', $request->employee_id)
        ->where('category', $request->category)
        ->first();
        $employee = EmpDoc::where('employee_id', $request->employee_id)->first();
        if ($existingEmployeeDoc) {
            // If the record with the same category exists, update the data
            $existingEmployeeDoc->doc_name = $request->doc_name;
            $existingEmployeeDoc->description = $request->description;
            $existingEmployeeDoc->isActive = $request->isActive ?? 0;
              // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($existingEmployeeDoc->file) {
                Storage::disk('public')->delete($existingEmployeeDoc->file);
            }

            // Store new file and save path
            $originalName = $request->file('file')->getClientOriginalName();
            $uniqueName = time() . '_' . $originalName;
            // $filePath = $request->file('file')->store('documents', 'public');
            $filePath = $request->file('file')->storeAs('documents', $uniqueName, 'public');
            $existingEmployeeDoc->file = $filePath;
        }
        $existingEmployeeDoc->update();
        $message = 'Document for the specified category updated successfully.';
    } else {
        // If the record with the same category does not exist, create a new record
            $originalName = $request->file('file')->getClientOriginalName();
            $uniqueName = time() . '_' . $originalName;
            $filePath = $request->file('file')->storeAs('documents', $uniqueName, 'public');
            // $filePath = $request->hasFile('file') ? $request->file('file')->store('documents', 'public') : null;
            $employee = EmpDoc::create([
                'employee_id' => $request->employee_id,
                'doc_name' => $request->doc_name,
                'category' => $request->category,
                'description' => $request->description,
                'file' => $filePath,
                'isActive' => $request->isActive,
            ]);
            $message = 'New document record created for the specified category.';
        }

        // Respond with success status
        return response()->json(['status' => 'success', 'message' => 'Document updated successfully.']);
    
    }

    public function editDocument($docId)
{
    $document = EmpDoc::find($docId); // Fetch the document by its ID
    // dd($document);
    if (!$document) {
        return response()->json(['error' => 'Document not found'], 404);
    }
    
    return response()->json([
        'document' => $document,
    ]);
}
public function deleteDocFile(Request $request)
{
    $fileName = $request->input('file');

    // Delete the file from the storage
    $filePath = storage_path('app/public/' . $fileName);
    // dd($filePath);
    if (file_exists($filePath)) {
        unlink($filePath); // Delete the file
        
        // Optionally, remove the file entry from the database
        $document = EmpDoc::where('file', $fileName)->first();
        // dd($document);
        if ($document) {
            $document->file = null; // Remove file reference
            $document->save();
        }

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'File not found']);
}

public function deleteDocInfo($id){
    $data = EmpDoc::findOrFail($id);
    // dd($data);
    $filePath = storage_path('app/public/' . $data->file);
    if (file_exists($filePath)) {
        unlink($filePath);
    }
    $data->delete();
    return response()->json(['success' => 'Data deleted successfully.']);
}
public function downloadDocument($id)
{
    $document = EmpDoc::findOrFail($id);

    if (!$document->file) {
        return response()->json(['status' => 'error', 'message' => 'File not found.'], 404);
    }
    
    // $filePath = storage_path('app/public/' . $document->file);
    $filePath = '/public/' . $document->file;
    // dd($filePath);

    if (Storage::exists($filePath)) {
        return Storage::download($filePath, $document->doc_name . '.' . pathinfo($document->file, PATHINFO_EXTENSION));
    }

    return response()->json(['status' => 'error', 'message' => 'File not found in storage.'], 404);
}
}
