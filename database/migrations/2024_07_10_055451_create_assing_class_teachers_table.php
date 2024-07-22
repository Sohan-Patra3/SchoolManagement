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
        Schema::create('assing_class_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('teacher_id');
            $table->string('status')->default(0);
            $table->string('is_delete')->default(0);
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assing_class_teachers');
    }
};
