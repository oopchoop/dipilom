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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->string('full_name');
            $table->date('birthday')->nullable();
            $table->string('number')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->default(false);
            $table->boolean('isDoctor')->default(false);
            $table->foreign('doctor_id')
                ->on('doctors')
                ->references('id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
