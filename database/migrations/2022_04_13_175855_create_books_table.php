<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * - id
     * - title (string, 255)
     * - authors (string, 255)
     * - description (text, nullable)
     * - released_at (date)
     * - cover_image (string, 255, nullable)
     * - pages (integer)
     * - language_code (string, 3, default:hu)
     * - isbn (string, 13, unique)
     * - in_stock (integer)
     * - timestamps (created_at, updated_at)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('authors', 255);
            $table->text('description')->nullable();
            $table->date('released_at');
            $table->string('cover_image', 255)->nullable();
            $table->integer('pages');
            $table->string('language_code', 3)->default('hu');
            $table->string('isbn', 13)->unique();
            $table->integer('in_stock');
            $table->timestamps();

            $table->softDeletes();
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
};
