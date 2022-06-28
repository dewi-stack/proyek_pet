<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transactions_doctor_id');
            $table->string('username');
            $table->string('genre');
            $table->boolean('is_times');
            $table->date('doe_date');
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
        Schema::dropIfExists('transaction_detail_doctors');
    }
}
