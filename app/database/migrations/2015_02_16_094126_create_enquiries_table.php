<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enquiries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
	        $table->string('surname');
	        $table->string('tel');
	        $table->string('email');
	        $table->mediumText('questions');
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
		Schema::drop('enquiries');
	}

}
