<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {

            $table->string('contract_no',50)->unique();

            $table->string('contract_type',20);

            $table->date('period_start');

            $table->date('period_end');

            $table->integer('extra_days');

            $table->decimal('amount')->default(0);

            $table->integer('villa_id')->unsigned();

            $table->integer('tenant_id')->unsigned();

            $table->integer('user_id')->unsigned();

            $table->string('status',10)->index();

            $table->text("configure")->nullable();

            $table->boolean("is_renew")->default(false);

            $table->timestamps();

            $table->softDeletes();

            $table->primary("contract_no");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
