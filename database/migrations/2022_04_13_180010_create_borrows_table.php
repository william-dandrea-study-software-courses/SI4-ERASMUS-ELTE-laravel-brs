<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  [x] id
        [x] reader_id (unsignedBigInteger, foreign, references:id, on:users)
            The reader who would like to borrow it
        [x] book_id (unsignedBigInteger, foreign, references:id, on:books)
            The book to be borrowed
        [x] status (enum: PENDING, ACCEPTED, REJECTED, RETURNED)
            The status of the rental:
                PENDING: the reader started a rental process
                REJECTED: the librarian rejected the rental request
                ACCEPTED: the librarian has accepted the rental request, i.e. the book is at the reader
                RETURNED: the reader brought back the book, and the librarian approved it
        [x] request_processed_at (datetime, nullable)
            The time when the rental request (pending) became rejected or accepted
        [x] request_managed_by (unsignedBigInteger, nullable, foreign, references:id, on:users)
            Librarian id who administered the rental request
        [x] deadline (datetime, nullable)
            If the librarian accepts the rental request, he/she can specify a deadline by which the book must be returned to the library
        [x] returned_at (datetime, nullable)
            The time when the librarian administered the return of the book
        [x] return_managed_by (unsignedBigInteger, nullable, foreign, references:id, on:users)
            Librarian id who administered the return of the book
        [x] timestamps (created_at, updated_at)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reader_id');
            $table->foreign('reader_id')->references('id')->on('users');

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');

            $table->enum('status', ['PENDING', 'REJECTED', 'ACCEPTED', 'RETURNED']);

            $table->dateTime('request_processed_at')->nullable();

            $table->unsignedBigInteger('request_managed_by')->nullable();
            $table->foreign('request_managed_by')->references('id')->on('users');

            $table->dateTime('deadline')->nullable();
            $table->dateTime('returned_at')->nullable();

            $table->unsignedBigInteger('return_managed_by')->nullable();
            $table->foreign('return_managed_by')->references('id')->on('users');

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
        Schema::dropIfExists('borrows');
    }
};
