<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {

            $table->increments('id');

            $table->integer("payment_schedule_id")->unique();

            $table->date('effectivity_date');

            $table->string('payment_type',50);

            $table->string('payment_no',50);

            $table->string('bank_source',50)->nullable();

            $table->string('description',150)->nullable();

            $table->decimal('amount')->default(0);

            $table->string('bank_account')->nullable();

            $table->date('deposited_date')->nullable();

            $table->date("approved_date")->nullable();

            $table->string('receipt_no');

            $table->string('remarks')->nullable();

            $table->integer('user_id')->index();

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
        Schema::dropIfExists('payment_details');
    }
}
