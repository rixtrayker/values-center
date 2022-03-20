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
        Schema::create('authenticates', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->foreignId('student_id')->constrained();
            $table->tinyInteger('ACT1')->nullable();
            $table->tinyInteger('ACT2')->nullable();
            $table->tinyInteger('EST1')->nullable();
            $table->tinyInteger('EST2')->nullable();
            $table->tinyInteger('cost')->nullable();
            $table->tinyInteger('paid')->nullable();
            $table->tinyInteger('service')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('send_score_times')->default(1);
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::dropIfExists('authenticates');
    }
};
