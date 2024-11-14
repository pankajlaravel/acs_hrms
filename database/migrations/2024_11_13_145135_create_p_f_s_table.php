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
        Schema::create('p_f_s', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('uan')->nullable();
            $table->string('pf_number')->nullable();
            $table->string('pf_join_date')->nullable();
            $table->string('family_pf_number')->nullable();
            $table->string('exits_eps')->nullable();
            $table->string('allow_eps')->nullable();
            $table->string('allow_epf')->nullable();
            $table->string('document_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_f_s');
    }
};
