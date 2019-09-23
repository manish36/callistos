<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title','100');
            $table->string('author','100');
            $table->string('price','100');
            $table->string('book_cover','100');
           $table->longText('description');
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
        Schema::dropIfExists('book_informations');
    }
}
