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
        Schema::create('emp_docs', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('doc_name')->nullable();
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('isActive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_docs');
    }
};
