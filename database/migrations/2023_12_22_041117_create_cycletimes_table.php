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
            $table->decimal('cycletime_monday', 5, 3);
            $table->decimal('cycletime_tuesday', 5, 3);
            $table->decimal('cycletime_wednesday', 5, 3);
            $table->decimal('cycletime_thursday', 5, 3);
            $table->decimal('cycletime_friday', 5, 3);
            $table->decimal('cycletime_saturday', 5, 3);
            $table->decimal('cycletime_sunday', 5, 3);
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
