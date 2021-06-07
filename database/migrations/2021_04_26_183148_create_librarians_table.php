<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librarians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manager_id')->unsigned();
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->string("name")->nullable();
            $table->string("surname")->nullable();
            $table->string("username");
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string("password");
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('librarians');
    }
}
