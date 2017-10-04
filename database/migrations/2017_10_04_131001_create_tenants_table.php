<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {

                $table->increments('id');

                $table->enum('type',["individual","company"])->index();

                $table->string('code',50)->unique();

                $table->string('full_name',150);

                $table->string('email_address',50);

                $table->string('tel_no',50);

                $table->string('mobile_no',50);

                $table->string('fax_no',50);

                $table->string('reg_id',150)->index();  //qatar id, cr no

                $table->string('reg_name',150);     //company or person in charge

                $table->date('reg_date');       // birth date or cr validity date

                $table->string('gender',10)->nullable();

                $table->string('address_1');

                $table->string('address_2')->nullable();

                $table->string('city');

                $table->string('postal_code');

                $table->timestamps();

                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
