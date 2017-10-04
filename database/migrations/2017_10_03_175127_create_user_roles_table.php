<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->index();

            $table->integer('role_id')->unsigned()->index();

            $table->timestamps();

            $table->primary(['user_id','role_id']);

            //foreign key
            $table->foreign('user_id')

                ->references('id')

                ->on('users');

            //foreign key
            $table->foreign('role_id')

                ->references('id')

                ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
