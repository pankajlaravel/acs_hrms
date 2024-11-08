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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('net_salary')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('tds')->nullable();
            $table->string('da')->nullable();
            $table->string('esi')->nullable();
            $table->string('hra')->nullable();
            $table->string('pf')->nullable();
            $table->string('allowance')->nullable();
            $table->string('prof_tax')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('conveyance')->nullable();
            $table->string('leave')->nullable();
            $table->string('labour_welfare')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
