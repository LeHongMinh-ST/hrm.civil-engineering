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
            $table->bigInteger('worker_id')->nullable();
            $table->string('datetime')->nullable();
            $table->bigInteger('sub_total')->nullable();
            $table->bigInteger('salary_advances')->nullable();
            $table->bigInteger('total')->nullable();
            $table->bigInteger('paid')->nullable();
            $table->string('status')->nullable();
            $table->integer('coefficients_salary')->nullable();
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
