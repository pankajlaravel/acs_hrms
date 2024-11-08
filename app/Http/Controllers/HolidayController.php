<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function adminHolidays(){
        $holidays = Holiday::latest()->get();
        return view('admin.holiday.list',compact('holidays'));
    }
    
    public function adminHolidayStore(Request $request){
        $data = $request->validate([
            'holiday_name' => 'required|string|max:255',
            'holiday_date' => 'required|string|max:255',
        ]);
        $holiday = Holiday::create($data);
        return response()->json(['success'=>'Holiday added successfully...']);
    }   

    public function adminHolidayEdit($id)
    {
        $holiday = Holiday::findOrFail($id);
        
        // dd($holiday);
        return response()->json($holiday);
    }

    public function adminHolidayUpdate(Request $request){
        $data = $request->validate([
            'holiday_name' => 'required|string|max:255',
            'holiday_date' => 'required|string|max:255',
        ]);
        $holiday = Holiday::findOrFail($request->id);
        $holiday->update($data);
        return response()->json(['success'=>'Holiday updated successfully...']);
    }

    public function adminHolidayDelete($id){
        $data = Holiday::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
