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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('citizen_identification')->nullable();
            $table->bigInteger('coefficients_salary')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('citizen_identification_front_image')->nullable();
            $table->string('citizen_identification_back_image')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
