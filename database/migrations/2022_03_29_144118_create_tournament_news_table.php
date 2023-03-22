<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_news', function (Blueprint $table) {
            $table->id();

            $table->text('image')->nullable();

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->tinyInteger('active')->default(1);

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
        Schema::dropIfExists('tournament_news');
    }
};
