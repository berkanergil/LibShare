<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('e_book_request_id')->unsigned();
            $table->foreign('e_book_request_id')->references('id')->on('e_book_requests');
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
        Schema::dropIfExists('e_books');
    }
}
