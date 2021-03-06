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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('reason');
            $table->integer('payment_amount');
            $table->integer('refund_discount')->nullable();
            $table->string('image')->nullable();
            $table->string('paying_method'); // vc - bank - cash
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('edu_center_id')->nullable()->constrained();
            $table->foreignId('vf_acc_id')->nullable()->constrained('v_cashes');
            $table->boolean('is_vf_trans')->default(0); //transfering money vs (deposit or withdraw )
            $table->foreignId('bank_id')->nullable()->constrained();
            $table->foreignId('registration_id')->nullable()->constrained();
            $table->foreignId('authenticate_id')->nullable()->constrained();
            $table->tinyInteger('status'); // 0 pending 1 done 2 refunded
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
        Schema::dropIfExists('payments');
    }
};
