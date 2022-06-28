<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doctor_packages_id');
            $table->integer('user_id')->nullable();
            $table->string('type_doctor');
            $table->integer('transaction_total');
            $table->string('transaction_status');
            // in_card, pending, success, cancle, failed
            $table->softDeletes();

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
        Schema::dropIfExists('transaction_doctors');
    }
}
