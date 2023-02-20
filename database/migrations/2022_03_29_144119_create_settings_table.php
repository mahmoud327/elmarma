<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->longtext('about_us')->nullable();
			$table->string('phone', 15)->nullable();
			$table->text('address')->nullable();
			$table->string('email', 30)->nullable();
			$table->string('fb_link', 100)->nullable();
			$table->string('linkedin_link', 100)->nullable();
			$table->string('tw_link', 100)->nullable();
			$table->string('inst_link', 100)->nullable();
			$table->string('whatsapp_link', 100)->nullable();
			$table->string('skype_link', 100)->nullable();
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
