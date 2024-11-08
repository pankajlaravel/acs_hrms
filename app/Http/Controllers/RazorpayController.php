<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\User;  // Assuming Employee model exists
use Exception;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\Salary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class RazorpayController extends Controller
{


    public function index(): View

    {        

        return view('payments.razorpayView');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function store(Request $request): RedirectResponse

    {

        $input = $request->all();

  

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

  

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

  

        if(count($input)  && !empty($input['razorpay_payment_id'])) {

            try {

                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

  

            } catch (Exception $e) {

                return  $e->getMessage();

                Session::put('error',$e->getMessage());

                return redirect()->back();

            }

        }

          

        Session::put('success', 'Payment successful');

        return redirect()->back();

    }

    public function createPayout(Request $request,$employeeId)
    {
        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // dd($api);

        // Fetch employee details
        // $employee = User::findOrFail($request->employee_id);
        $employee = DB::table('users')
        ->join('salaries','users.id','=','salaries.emp_id')
        ->select('users.firstName','users.stripe_account_id','salaries.basic_salary as salary')
        ->where('users.id', $employeeId)
        ->get()->first();

        // Payout data (simulation with RazorpayX test mode)
        $payoutData = [
            'account_number' => env('RAZORPAYX_ACCOUNT_NUMBER'),
            'fund_account' => [
                'account_type' => 'bank_account',
                'bank_account' => [
                    'name' => $employee->firstName,
                    // 'ifsc' => $employee->bank_ifsc,
                    'account_number' => $employee->stripe_account_id
                ],
                'contact' => [
                    'name' => $employee->firstName,
                    // 'email' => $employee->email,
                    // 'contact' => $employee->phone
                ]
            ],
            'amount' => $employee->salary * 100,  // Amount in paise (e.g., ₹1000 is 100000 paise)
            'currency' => 'INR',
            'mode' => 'IMPS',  // Can be IMPS, NEFT, RTGS
            'purpose' => 'salary',  // Payment purpose
            'queue_if_low_balance' => true  // Queues the payout if your RazorpayX account has low balance
        ];

        try {
            // Create the payout using Razorpay API
            $payout = $api->payout->create($payoutData);

            // Log the payout response for debugging
            Log::info('Payout created:', (array) $payout);

            // Mark employee's salary as paid (update the salary record)
            $employee->salary->status = 'paid';
            $employee->salary->payout_id = $payout->id;
            $employee->salary->save();

            return response()->json(['success' => true, 'message' => 'Salary transferred successfully']);
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Payout failed:', ['error' => $e->getMessage()]);

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function transferSalary(Request $request,$employeeId)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'amount' => 'required|numeric',
        'currency' => 'required|string',
    ]);
    
    $employee = DB::table('users')
    ->join('salaries','users.id','=','salaries.emp_id')
    ->select('users.firstName','users.stripe_account_id','salaries.basic_salary as salary')
    ->where('users.id', $employeeId)
    ->get()->first();
    
    // Call Razorpay API to create transfer
    $response = Http::withBasicAuth('rzp_test_ZNm5xej1gXcAbY', '265lnj7KhaBzzwjA9zvBfZT6')
    ->post('https://api.razorpay.com/v1/transfer', [
        'amount' => $employee->salary,
        'currency' => 'INR',
        'recipient' => '123456789',
    ]);
    dd($response);

    if ($response->successful()) {
        // Save transfer details in database
        Salary::create([
            'emp_id' => $employee->id,
            'net_salary' => $request->amount,
            'basic_salary' => 'success',
        ]);

        return response()->json(['status' => 'created', 'id' => $response['id']], 201);
    } else {
        return response()->json(['status' => 'failed'], 400);
    }
}

public function sendMoney(Request $request)
    {
        // Validate the request
        $request->validate([
            'employee_id' => 'required|integer',
            'amount' => 'required|numeric|min:1',
        ]);

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Define the payment details
        $paymentDetails = [
            'amount' => $request->amount * 100, // Amount in paise
            'currency' => 'INR',
            'receipt' => 'Receipt#1',
            'notes' => [
                'employee_id' => $request->employee_id, // Employee ID for reference
            ],
        ];

        try {
            // Create payment
            $payment = $api->payment->create($paymentDetails);
            
            // Optional: Save payment details to your database here

            return response()->json($payment);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Handle successful payment response
        // You can update the employee's balance or record the payment in your database here

        return response()->json(['message' => 'Payment successful!', 'data' => $request->all()]);
    }
}