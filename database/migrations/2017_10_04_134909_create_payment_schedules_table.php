<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_schedules', function (Blueprint $table) {

            $table->increments('id');

            $table->date('due_date');

            $table->enum('payment_mode',["payment", "deposit"]);

            $table->date('period_start');

            $table->date('period_end');

            $table->decimal('amount')->default(0);

            $table->date('posted_date')->nullable();

            $table->string("status");   //pending, on-hand, clear, bounce, replace

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
        Schema::dropIfExists('payment_schedules');
    }
}
