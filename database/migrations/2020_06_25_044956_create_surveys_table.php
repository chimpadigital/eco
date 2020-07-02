<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('how_did_you_know_manual')->nullable();
            $table->string('process_download')->nullable();
            $table->string('virtual_assists_boolean')->nullable();
            $table->string('virtual_assists')->nullable();
            $table->string('call_time_boolean')->nullable();
            $table->string('call_time')->nullable();
            $table->string('quality_advice_boolean')->nullable();
            $table->string('quality_advice')->nullable();
            $table->string('attention')->nullable();
            $table->string('suggestions')->nullable();
            //content
            $table->string('content_option_1')->nullable();
            $table->string('content_option_2')->nullable();
            $table->string('content_option_3')->nullable();
            $table->string('content_option_4')->nullable();
            $table->string('content_option_5')->nullable();
            $table->string('content_option_6')->nullable();
            //chapters
            $table->string('chapter_1')->nullable();
            $table->string('chapter_2')->nullable();
            $table->string('chapter_3')->nullable();
            $table->string('chapter_4')->nullable();
            $table->string('chapter_5')->nullable();
            $table->string('chapter_6')->nullable();
            $table->string('chapter_7')->nullable();
            $table->string('chapter_8')->nullable();
            
            //personal assessment
            $table->string('satisfied')->nullable();
            $table->string('suggestions_2')->nullable();
            $table->string('would_you_recommend')->nullable();
            $table->string('like')->nullable();
            
            //relations
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
        Schema::dropIfExists('surveys');
    }
}
