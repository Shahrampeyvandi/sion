<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('si_theme')->nullable();
            $table->string('si_logo')->nullable();
            $table->boolean('header_menu')->default(true);
            $table->boolean('footer_menu')->default(true);
            $table->boolean('si_comments')->default(true);
            $table->boolean('si_votes')->default(true);
            $table->string('login_background')->nullable();
             $table->string('default_poster')->nullable();
             $table->text('footer_text')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
