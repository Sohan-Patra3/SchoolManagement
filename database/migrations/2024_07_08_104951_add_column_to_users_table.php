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
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_joining')->nullable()->after('addmission_date');
            $table->string('marital_status')->nullable()->after('addmission_date');
            $table->string('note')->nullable()->after('marital_status');
            $table->string('qualification')->nullable()->after('note');
            $table->string('work_experience')->nullable()->after('qualification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['date_of_joining' , 'marital_status' , 'note' , 'qualification' , 'work_experience' ]);
        });
    }
};
