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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nij', 16)->nullable();
            $table->string('nama', 100);
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date');
            $table->string('birth_place', 100);
            $table->text('address');
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->enum('status_perkawinan', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
