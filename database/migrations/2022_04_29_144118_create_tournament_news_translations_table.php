<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_news_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('desc');
            $table->unsignedBigInteger('new_id');
            $table->foreign('new_id')->references('id')->on('tournament_news')->onDelete('cascade');

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
        Schema::dropIfExists('tournament_news_translations');

    }
};
