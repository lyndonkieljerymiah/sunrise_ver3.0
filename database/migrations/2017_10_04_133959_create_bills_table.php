<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {

            $table->string('bill_no',50)->unique();

            $table->integer('payee_id')->unsigned();

            $table->string('contract_no')->unsigned();

            $table->integer('user_id')->index();

            $table->date('closed_date')->nullable();

            $table->timestamps();

            $table->primary("bill_no");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
