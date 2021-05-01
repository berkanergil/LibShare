<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenalizedReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalized_reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reserved_book_id')->unsigned();
            $table->foreign('reserved_book_id')->references('id')->on('reserved_books')->onDelete("cascade");
            $table->integer("amount");
            $table->integer("penalized_date_number");
            $table->boolean("pay_status");
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
        Schema::dropIfExists('penalized_reservations');
    }
}
