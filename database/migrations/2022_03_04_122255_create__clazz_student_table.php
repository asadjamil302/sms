<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClazzStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clazz_student', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            // $table->foreignId('clazz_id')->constrained('clazzs')->onDelete('cascade');
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
        Schema::dropIfExists('clazz_student');
    }
}
