<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('slug');
            $table->string('rollno');
            $table->string('dob');
            $table->string('admission_date');
            $table->string('clazz_name');
            $table->string('student_address');
            $table->string('parent_name');
            $table->string('parent_cnic');
            $table->string('parent_contact');
            $table->string('emergency_contact');
            $table->string('student_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
