<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Employee;
use App\Models\User;
use Stripe\Account;
use App\Models\Salary;
use DB;


class PaymentController extends Controller
{
    public function createConnectedAccount(User $employee)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $account = Account::create([
            'type' => 'custom',
            'country' => 'US',
            'email' => $employee->personal_email,
            'capabilities' => [
                'transfers' => ['requested' => true],
            ],
        ]);

        // Store the account ID in the employee record
        $employee->stripe_account_id = $account->id;
        $employee->save();

        return response()->json([
            'success' => true,
            'account_id' => $account->id,
            'message' => 'Connected account created successfully.',
        ]);
    }


    public function addBankAccount(Request $request, User $employee)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $bankAccount = Account::retrieve($employee->stripe_account_id)
            ->external_accounts
            ->create([
                'external_account' => [
                    'object' => 'bank_account',
                    'country' => 'US',
                    'currency' => 'usd',
                    'account_holder_name' => $request->input('account_holder_name'),
                    'account_holder_type' => 'individual',
                    'routing_number' => $request->input('routing_number'),
                    'account_number' => $request->input('account_number'),
                ],
            ]);

        return response()->json([
            'success' => true,
            'bank_account_id' => $bankAccount->id,
            'message' => 'Bank account added successfully.',
        ]);
    }

    public function payEmployee(User $employee)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $transfer = \Stripe\Transfer::create([
                'amount' => 500 * 100, // Convert to cents
                'currency' => 'usd',
                // 'destination' => 'acct_1PSv2bG5SWecoBYe',
                'destination' => 'acct_1PSv2bG5SWecoBYe',
                'description' => 'Monthly Salary Payment',
            ]);

            return response()->json([
                'success' => true,
                'transfer_id' => $transfer->id,
                'message' => 'Payment sent successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process payment: ' . $e->getMessage(),
            ], 500);
        }
    }
}
