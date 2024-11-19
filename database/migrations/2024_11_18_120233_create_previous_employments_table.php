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
        Schema::create('previous_employments', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('relevant_experience_in_year')->nullable();
            $table->string('relevant_experience_in_month')->nullable();
            $table->text('company_address')->nullable();
            $table->text('nature_of_duties')->nullable();
            $table->string('leaving_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_employments');
    }
};
