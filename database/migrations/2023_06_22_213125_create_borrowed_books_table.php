<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            
            $table->auditableWithDeletes();
            $table->softDeletes();
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
        Schema::dropIfExists('borrowed_books');
    }
}
