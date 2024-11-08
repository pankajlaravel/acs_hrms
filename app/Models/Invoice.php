<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'project_id',
        'email',
        'tax',
        'client_address',
        'billing_address',
        'invoice_date',
        'due_date',
        'item',
        'description',
        'unit_cost',
        'qty',
        'amount',
        'total_amount',
        'discount',
        'tax_percentage',
        'grand_total',
        'other_info',
        'invoice_id',
        'status',

    ];

    public static function generateSalaryInvoiceId()
    {
        do {
            // Generate a random six-digit number
            $invoiceId = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('invoice_id', $invoiceId)->exists());

        return $invoiceId;
    }
}
