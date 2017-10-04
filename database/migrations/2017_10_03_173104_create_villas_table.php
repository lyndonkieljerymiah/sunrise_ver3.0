<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {

            $table->increments('id');

            $table->string("villa_no",20)->unique();

            $table->string("property_code");

            $table->string("electricity_no",150)->nullable();

            $table->string("water_no",150)->nullable();

            $table->string("qtel_no",150)->nullable();

            $table->longText('description');

            $table->string("villa_class",50)->index();

            $table->integer("capacity")->default(0);

            $table->decimal("rate_per_month")->default(0);

            $table->enum('type',['public','private']);

            $table->boolean('is_active')->default(true);

            $table->string("occupied_date")->nullable();

            $table->string("status",20);

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
        Schema::dropIfExists('villas');
    }
}
