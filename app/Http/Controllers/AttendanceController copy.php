<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   public function checkIn(Request $request)
{ 
    // dd($request->all());
    
    $request->validate([
        'location' => 'required|string',
    ]);
    // Split the location string into latitude and longitude
    list($latitude, $longitude) = explode(',', $request->location);
    // dd(list($latitude, $longitude));

    $attendance = new Attendance();
    $attendance->employee_id = auth()->user()->id; // Assuming the user is authenticated
    $attendance->check_in = now();
    $attendance->location = json_encode(['latitude' => $latitude, 'longitude' => $longitude]); // Store as JSON
    $attendance->save();

    return response()->json(['message' => 'Checked in successfully!']);
}

private function calculateDistance($lat1, $lon1, $lat2, $lon2)
{
    $earthRadius = 6371; // Earth's radius in kilometers

    $latFrom = deg2rad($lat1);
    $lonFrom = deg2rad($lon1);
    $latTo = deg2rad($lat2);
    $lonTo = deg2rad($lon2);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

    return $angle * $earthRadius;
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


}

