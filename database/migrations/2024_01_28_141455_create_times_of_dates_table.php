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
        Schema::create('times_of_dates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('times_id')->unsigned();
            $table->boolean('busy')->default(false);
            $table->date('date');
            $table->foreign('doctor_id')
                ->on('doctors')
                ->references('id');
            $table->foreign('times_id')
                ->on('times')
                ->references('id');
            $table->timestamps(
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times_of_dates');
    }
};
