<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Lead;
use App\Models\Client;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function adminDashboard(){
        $employee = User::where("role","=","employee")->get();
        $headCount = User::count();
        $monthlyHeadCount = User::select(\DB::raw("MONTHNAME(created_at) as month"), \DB::raw('count(*) as count'))
        ->groupBy('month')
        ->orderBy(\DB::raw("MONTH(created_at)"))
        ->get();
        // dd($headCount);
        $project = Project::latest()->get();
        $leads = Lead::where("status","=",0)->get();
        $client = Client::latest()->get();
        $currentHour = Carbon::now('Asia/Kolkata')->format('H');
        if ($currentHour < 12) {
            $greeting = "Good Morning";
        } elseif ($currentHour < 18) {
            $greeting = "Good Afternoon";
        } else {
            $greeting = "Good Evening";
        }
        // dd($greeting);
        $userData = $employee->map(function ($user) {
            return [
                'firstName' => $user->firstName,   // or any other fields you need
                'created_at' => $user->created_at->format('d-m-Y'),  // example field
            ];
        });

        $projects = $project->map(function ($data) {
            return [
                'project_name' => $data->project_name,   // or any other fields you need
                'created_at' => $data->created_at->format('d-m-Y'),  // example field
            ];
        });
        // dd($userData);
        return view('admin.dashboard',compact(
            'employee',
            'project',
                       'leads',
                       'greeting',
                       'client',
                       'headCount',
                       'monthlyHeadCount',
                       'userData',
                       'projects',
            
        ));
    }

    public function adminProfile(){
        return view('admin.profile.profile');
    }
}
