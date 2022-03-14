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
        Schema::create('catchers', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('student_name');
            $table->string('admin_name');
            $table->string('notes')->nullable(); // before
            $table->string('comment')->nullable(); // after
             // 0 nothing 1 processing 2 completed 3 failed
            $table->tinyInteger('state')->default(0);
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
        Schema::dropIfExists('catchers');
    }
};
