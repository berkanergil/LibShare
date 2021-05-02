<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarian_id')->unsigned();
            $table->foreign('librarian_id')->references('id')->on('librarians');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");
            $table->string("title");
            $table->string("author");
            $table->date('publish_date')->format('d/m/Y');
            $table->string("language");
            $table->text("description");
            $table->string("image");
            $table->tinyInteger("stock_number");
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
        Schema::dropIfExists('books');
    }
}
