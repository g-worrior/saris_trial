<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_grades', function (Blueprint $table) {
            $table->bigIncrements('processed_grade_id');
            $table->string('student_regi_no');
            $table->string('course_code');
            $table->integer('semester_id');
            $table->float('final_grade');
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
        Schema::dropIfExists('processed_grades');
    }
};
