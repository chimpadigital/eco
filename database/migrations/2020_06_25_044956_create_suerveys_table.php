<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuerveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suerveys', function (Blueprint $table) {
            $table->id();
            $table->string('how_did_you_know_manual');
            $table->string('process_download');
            $table->string('virtual_assists_boolean');
            $table->string('virtual_assists');
            $table->string('call_time_boolean');
            $table->string('call_time');
            $table->string('quality_advice_boolean');
            $table->string('quality_advice');
            $table->string('attention');
            $table->string('suggestions');
            //content
            $table->string('content_option_1');
            $table->string('content_option_2');
            $table->string('content_option_3');
            $table->string('content_option_4');
            $table->string('content_option_5');
            $table->string('content_option_6');
            //chapters
            $table->string('chapter_1');
            $table->string('chapter_2');
            $table->string('chapter_3');
            $table->string('chapter_4');
            $table->string('chapter_5');
            $table->string('chapter_6');
            $table->string('chapter_7');
            $table->string('chapter_8');
            
            //personal assessment
            $table->string('satisfied');
            $table->string('suggestions_2');
            $table->string('would_you_recommend');
            $table->string('like');
            
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
        Schema::dropIfExists('suerveys');
    }
}
