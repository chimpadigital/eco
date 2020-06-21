<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('occupation')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('others')->nullable();
            $table->string('motivation')->nullable();
            $table->string('did_you_know_foundation')->nullable();
            $table->integer('ong')->nullable();
            $table->string('name_ogn')->nullable();
            $table->string('web_page')->nullable();
            $table->string('allies_to_implement')->nullable();
            $table->string('implementation_ant')->nullable();
            $table->string('implementation_name')->nullable();
            $table->string('impact_class')->nullable();
            $table->string('extra_information')->nullable();

            //Relations

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_information');
    }
}
