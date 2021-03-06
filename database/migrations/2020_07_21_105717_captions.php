<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Captions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('captions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang');
            $table->string('url');
             $table->unsignedBigInteger('captionable_id');
            $table->string('captionable_type');
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
        Schema::dropIfExists('captions');
    }
}
