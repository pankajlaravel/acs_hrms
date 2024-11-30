<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
{
    public function index(){
        $attendance = Attendance::where('employee_id', auth()->user()->id)
                            ->orderBy('check_in', 'desc')
                            ->first();
        return view('employee.attendance.index',[
            'attendance'=> $attendance,
        ]);
    }
    public function checkIn(Request $request)
    {
        // dd($request->latitude);
        $employee = auth()->user(); // Assuming the employee is logged in
        // Office location (hardcoded for your office)28.62545146955422, 77.37838871762746
        $officeLatitude = 28.626411;
        $officeLongitude = 77.379627;
        
        // Validate request data
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        // Calculate distance between employee's location and office
        $distance = $this->calculateDistance(
            $request->latitude, 
            $request->longitude, 
            $officeLatitude, 
            $officeLongitude
        );

        // dd($distance);

        if ($distance <= 5) {
            // Mark attendance as present
            Attendance::create([
                'employee_id' => $employee->id,
                'status' => 'present',
                'check_in' => now(),
            ]);

            return response()->json(['message' => 'Attendance updated successfully.']);
        } else {
            Attendance::create([
                'employee_id' => $employee->id,
                'status' => 'pending',
                'check_in' => now(),
            ]);
            // Mark attendance as pending
            return response()->json(['message' => 'You are not within the office radius wait for approval.']);
        }
    }

    // Haversine formula to calculate distance in kilometers between two coordinates
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers
       
        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);
        
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $latDiff = $latTo - $latFrom;
        $lonDiff = $lonTo - $lonFrom;

  
        $a = sin($latDiff / 2) * sin($latDiff / 2) + cos($lat1) * cos($lat2) * sin($lonDiff / 2) * sin($lonDiff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }

public function checkOut(Request $request)
{
    $attendance = Attendance::where('employee_id', auth()->user()->id)
                            ->whereNull('check_out')
                            ->first();

    if ($attendance) {
        $attendance->check_out = now();
        $attendance->save();

        return response()->json(['message' => 'Checked out successfully!']);
    }

    return response()->json(['message' => 'You need to check in first!'], 400);
}

public function showAttendance(){
    
    $get_data = DB::table('users')
    ->join('designations', 'users.designation_id', '=', 'designations.id')
    ->select('users.*', 'designations.name as designations_name')
    ->where('role', 'employee')
    ->latest()
    ->get();
    // dd($get_data);
    return view('admin.attendance.list',compact('get_data'));
}


public function filterAttendance(Request $request)
{
    // dd($request->all());
    // Validate date inputs
    $request->validate([
        'from_date' => 'nullable|date',
        'to_date' => 'nullable|date|after_or_equal:from_date',
        'employee' => 'nullable|exists:users,id',
        'status' => 'nullable|string',
    ]);

    // Retrieve filter inputs
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $employeeId = $request->input('employee');
    $status = $request->input('status');

    // Start query and apply filters conditionally
    $query = Attendance::with('employee');

    if ($fromDate) {
        $query->whereDate('created_at', '>=', $fromDate);
    }

    // Apply to_date filter (less than or equal to to_date)
    if ($toDate) {
        $query->whereDate('created_at', '<=', $toDate);
    }
    if ($employeeId) {
        $query->where('employee_id', $employeeId);
    }
    if ($status) {
        $query->where('status', $status);
    }
$attendanceRecords = $query->orderBy('created_at', 'desc')->get();
$attendanceRecords = $attendanceRecords->map(function ($attendance) {
    // Format the created_at date
    $attendance->created_at = \Carbon\Carbon::parse($attendance->created_at)->format('d-m-Y'); // Change format as needed
    if ($attendance->check_in_time) {
        $attendance->check_in_time = \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i'); // Format time as needed
    }
    if ($attendance->check_out_time) {
        $attendance->check_out_time = \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i'); // Format time as needed
    }
    return $attendance;
});

    return response()->json($attendanceRecords);
}

public function getAttendanceData()
{
    $attendance = Attendance::all()->map(function($record) {
        return [
            'title' => $record->status, // 'Present', 'Absent', etc.
            'start' => $record->date,   // Date of attendance
            'color' => $record->status == 'Present' ? '#28a745' : ($record->status == 'Absent' ? '#dc3545' : '#ffc107')
        ];
    });

    return response()->json($attendance);
}

public function reportAttendance(Request $request)
{
    // $attendances = DB::table('attendances')
    //     ->select('created_at', DB::raw("CASE WHEN status = 'Present' THEN 'Present' ELSE 'Absent' END as status"))
    //     ->get();
    //     $attendanceData = $attendances->map(function ($item) {
    //         return [
    //             'date' => $item->created_at,
    //             'status' => $item->status,
    //         ];
    //     });
    
    $currentMonth = now()->month; // Current month
    $currentYear = now()->year; // Current year
        $attendances = Attendance::select('created_at', 'status')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->get()
        ->keyBy('created_at');
        // dd($attendances);

    return view('admin.attendance.report', [
        'attendances' => $attendances,
        'monthName' => Carbon::now()->format('F'),
        'year' => $currentYear,
    ]);
}

}

