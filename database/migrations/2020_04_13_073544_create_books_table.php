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
            $table->string('title',100);
            $table->text('synopsis');
            $table->foreignId('author_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->foreignId('category_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->foreignId('publisher_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->foreignId('trailer_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->foreignId('review_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            
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
