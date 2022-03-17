<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained();
            $table->foreignId('course_id')->constrained();
            $table->string('month')->nullable();
            $table->integer('cost');
            $table->date('start_date')->nullable();
            $table->date('day_one')->nullable();
            $table->date('day_two')->nullable();
            $table->tinyInteger('number_of_sessions');
            $table->date('date')->nullable();
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
        Schema::dropIfExists('lectures');
    }
};
