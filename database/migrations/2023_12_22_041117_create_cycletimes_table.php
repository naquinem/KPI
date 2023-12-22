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
        Schema::create('cycletimes', function (Blueprint $table) {
            $table->id();
            $table->integer('workweek');
            $table->string('cycletime_monday');
            $table->string('cycletime_tuesday');
            $table->string('cycletime_wednesday');
            $table->string('cycletime_thursday');
            $table->string('cycletime_friday');
            $table->string('cycletime_saturday');
            $table->string('cycletime_sunday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycletimes');
    }
};
