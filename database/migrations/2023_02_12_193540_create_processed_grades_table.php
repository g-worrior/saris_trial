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
            $table->integer('course_id');
            $table->integer('semester_id');
            $table->integer('assignment_percentage');
            $table->integer('exam_percentage');
            $table->integer('total_percentage');
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
