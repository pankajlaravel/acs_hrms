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
            $table->string('emp_id')->nullable();
            $table->string('pf_type')->nullable();
            $table->string('emp_share_amt')->nullable();
            $table->string('org_share_amt')->nullable();
            $table->string('emp_share_persant')->nullable();
            $table->string('org_share_persant')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
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
