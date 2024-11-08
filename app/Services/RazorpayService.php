<?php

namespace App\Services;

use Razorpay\Api\Api;

class RazorpayService
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api('rzp_test_ZNm5xej1gXcAbY', '265lnj7KhaBzzwjA9zvBfZT6');
    }

    public function createPayment($amount, $currency)
    {
        $payment = $this->api->payment->create([
            'amount' => $amount * 100, // Amount is in paise
            'currency' => $currency,
            'receipt' => 'receipt#1',
            'payment_capture' => 1,
        ]);

        return $payment;
    }
}
