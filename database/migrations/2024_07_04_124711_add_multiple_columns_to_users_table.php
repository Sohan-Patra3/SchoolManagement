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
            $table->string('last_name')->nullable()->after('name');
            $table->string('addmission_number')->nullable()->after('remember_token');
            $table->string('roll_number')->nullable()->after('addmission_number');
            $table->integer('class_id')->nullable()->after('roll_number');
            $table->string('gender')->nullable()->after('class_id');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('caste')->nullable()->after('date_of_birth');
            $table->string('religion')->nullable()->after('caste');
            $table->string('mobile_number')->nullable()->after('religion');
            $table->string('addmission_date')->nullable()->after('mobile_number');
            $table->string('profile_pic')->nullable()->after('addmission_date');
            $table->string('blood_group')->nullable()->after('profile_pic');
            $table->string('height')->nullable()->after('blood_group');
            $table->string('weight')->nullable()->after('height');
            $table->integer('is_delete')->default(0)->after('user_type');
            $table->integer('status')->default(0)->after('is_delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'last_name',
                'addmission_number',
                'roll_number',
                'class_id',
                'gender',
                'date_of_birth',
                'caste',
                'religion',
                'mobile_number',
                'addmission_date',
                'profile_pic',
                'blood_group',
                'height',
                'weight',
                'is_delete',
                'status'
            ]);
        });
    }
};
