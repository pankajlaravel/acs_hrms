<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    public function adminProject(){
        // $users = User::with('department')->get();
        // $projects = DB::table('projects')->latest()->paginate(50);
        $projects = DB::table('projects')
        ->join('leads', 'projects.lead_id', '=', 'leads.id')
        ->join('clients', 'projects.client_id', '=', 'clients.id')// assuming there is a user_id in projects table
        ->select('projects.*', 'leads.firstName as lead_first_name',
                                        'leads.lastName as lead_last_name',
                                        'leads.picture as lead_picture',
                                        'clients.firstName as client_first_name',
                                        'clients.lastName as client_last_name'
        ) // specify what you need from each table 
        ->latest()
        ->paginate(50);

        $leads = DB::table('leads')->latest()->get();
        $clients = DB::table('clients')->latest()->get();
        $projectId = Project::generateProjectId();
        // dd($projectId);
        return view('admin.project.list',compact('projects','projectId','leads','clients'));
    }

    public function adminProjectEdit($id)
    {
        // $id = 1;
        $selected = DB::table('clients')
        ->leftJoin('projects', 'clients.id', '=', 'projects.client_id') // Use leftJoin to include clients without projects
        ->select('clients.id as clientID','clients.firstName as fname','projects.client_id as match_id') // Select only the clients
        ->where('clients.id', '!=', 'projects.client_id')
        ->get();
        
        $project = DB::table('projects')
        ->join('leads', 'projects.lead_id', '=', 'leads.id')
        ->join('clients', 'projects.client_id', '=', 'clients.id')// assuming there is a user_id in projects table
        ->select('projects.*', 'leads.firstName as lead_first_name',
        'leads.lastName as lead_last_name',
        'leads.picture as lead_picture',
        'clients.firstName as client_first_name',
        'clients.lastName as client_last_name'
        )
        ->where('projects.id', $id) // Filter by the specific ID
        ->first();
        // dd($project);
        // return response()->json($project);
        $response = [
            'project' => $project,
            'selected' => $selected,
        ];
    
        return response()->json($response);
    }

    public function adminProjectStore(Request $request){
        
        $data = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_id' => 'required|string|unique:projects',
            'client_id' => 'required|string',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'rate' => 'required|string|max:255',
            'rate_type' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'lead_id' => 'required|string|max:255',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        // dd($data);

        // Handle image upload
        if ($request->hasFile('picture')) {
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('projects/img/'), $filename);
            $data['picture'] = $filename;
        }
        $project = Project::create($data);
        return response()->json(['success'=>'Project added successfully...']);
    
    }

    public function adminProjectUpdate(Request $request) {
        // Fetch the existing user
        // dd($request->all());
        $project = Project::findOrFail($request->id);
    
        $data = $request->validate([
            // 'id' => 'required|integer|exists:projects,id',
            'project_name' => 'required|string|max:255',
            // 'project_id' => 'required|string|unique:projects',
            'client_id' => 'required|string',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'rate' => 'required|string|max:255',
            'rate_type' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'lead_id' => 'required|string|max:255',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists (optional)
            if ($project->picture) {
                @unlink(public_path('projects/img/' . $project->picture));
            }
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('leads/img/'), $filename);
            $data['picture'] = $filename;
        }
    
        // Update the user with new data
        $project->update($data);
    
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

    public function adminProjectView(Request $request,$id){
    //    $project = Project::findOrFail($id);
       $project = DB::table('projects')
        ->join('leads', 'projects.lead_id', '=', 'leads.id')

        ->select('projects.*', 'leads.firstName as lead_first_name',
                                        'leads.lastName as lead_last_name',
                                        'leads.picture as lead_img',
                                        
        ) // specify what you need from each table 
        ->latest()
        ->first();
    //    dd($data);
        return view('admin.project.view',compact('project'));
    }

    public function adminProjectDelete($id){
        $data = Project::findOrFail($id);
        
        if ($id) {
            @unlink(public_path('projects/img/' . $$data->picture));
        }
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
