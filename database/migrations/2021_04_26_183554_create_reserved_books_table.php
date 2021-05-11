<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saved_book_id')->unsigned();
            $table->foreign('saved_book_id')->references('id')->on('saved_books')->onDelete("cascade");
            $table->date('start_date')->format('m/d/Y');
            $table->date('end_date')->format('m/d/Y');
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
        Schema::dropIfExists('reserved_books');
    }
}
