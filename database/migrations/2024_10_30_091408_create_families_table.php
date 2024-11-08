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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('remarks')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('relation')->nullable();
            $table->string('address_same_as_emp')->nullable();
            $table->string('address')->nullable();
            $table->string('pin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
