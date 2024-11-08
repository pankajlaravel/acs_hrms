<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function store(Request $request, $id = null)
    {
        // Validate the incoming request data
        // dd($request->all());
        $id = $request->input('id');
        $validatedData = $request->validate([
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'company_name' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'pin_code' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'fax' => 'nullable|string',
            'url' => 'nullable|url',
        ]);

        if ($id) {
            // Update existing company
            $setting = Setting::findOrFail($id);
            if ($request->hasFile('logo')) {
                // Delete the old logo if it exists (optional)
                if ($setting->logo) {
                    @unlink(public_path('logo/img/' . $setting->logo));
                }
                $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
                $request->file('logo')->move(public_path('logo/img/'), $filename);
                $validatedData['logo'] = $filename;
            }
            elseif ($request->hasFile('favicon')) {
                // Delete the old logo if it exists (optional)
                if ($setting->favicon) {
                    @unlink(public_path('logo/img/' . $setting->logo));
                }
                $filename = time() . '_' . $request->file('favicon')->getClientOriginalName();
                $request->file('favicon')->move(public_path('logo/img/'), $filename);
                $validatedData['favicon'] = $filename;
            }
            $setting->update($validatedData);
        } else {
            // Create new company
            $setting = Setting::create($validatedData);
        }

        return redirect()->back()->with('success', 'Company settings saved successfully.');
    }

    public function index()
    {
        $settings = Setting::first();
        // dd($settings);
        // return response()->json($settings);
        return view('admin.setting.setting',compact('settings'));   
    }

    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json($setting);
    }
}
