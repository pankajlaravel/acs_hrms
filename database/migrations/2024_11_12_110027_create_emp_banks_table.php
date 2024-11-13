<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emp_banks', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('bank_branch_id')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_type')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_banks');
    }
};
