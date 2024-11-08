<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Transfer;
use DB;
use Stripe\Account;

// use Stripe\Salary;

class PaymentController extends Controller
{
    public function payEmployee($employeeId)
    {
        // Set the Stripe API secret key
        // Stripe::setApiKey(config('services.stripe.secret'));
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // dd(config('services.stripe.secret'));
        // Fetch employee details
        // $employee = User::findOrFail($employeeId);
        $employee = DB::table('users')
        ->join('salaries','users.id','=','salaries.emp_id')
        ->select('users.firstName','users.stripe_account_id','salaries.basic_salary as salary')
        ->where('users.id', $employeeId)
        ->get()->first();
       
        // dd($employee);
        try {

            
            // Create a transfer to the employee's bank account
            $transfer = Transfer::create([
                'amount' => $employee->salary * 100, // Amount in cents
                'currency' => 'eur', // Use the correct currency
                'destination' => 'acct_1QHPCmIzmmLArDxM ', // Connected account ID (e.g., 'acct_xxxxxxxxxxxx')
                'description' => 'Monthly Salary Payment',
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Payment sent successfully',
                'transfer_id' => $transfer->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process payment: ' . $e->getMessage(),
            ], 500);
        }
    }
}

