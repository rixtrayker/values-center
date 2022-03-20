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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('test_center');
            $table->foreignId('student_id')->constrained();
            $table->foreignId('edu_center_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->tinyInteger('status'); // 0 booked 1 paid 2 booked and paid
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
        Schema::dropIfExists('registrations');
    }
};
