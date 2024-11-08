<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function taskPortal(){
        $employee = User::where('role','=','employee')->get();
        $data = DB::table('tasks')
        ->join('users','tasks.assignee','=','users.id')
        ->select('tasks.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        )
        ->orderBy('tasks.id','desc')->get();
        return view('admin.task.index',[
            'employee' => $employee,
            'data' => $data
        ]);
    }

    public function taskStore(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'checklist' => 'nullable|string',
            'tag' => 'nullable|string',
            'followers' => 'nullable|string',
            'assignee' => 'required|exists:users,id',
            'status' => 'required|in:pending,in-progress,completed',
            'priority' => 'required|in:low,medium,high',
            'start_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:start_date',
        ]);

        $task = Task::create($data);
        return response()->json(['success' => true, 'message' => 'Task created successfully', 'task' => $task]);
    }
}
