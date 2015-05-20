<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstname');
			$table->string('surname');
			$table->string('tel');
			$table->string('email');
			$table->text('message');
			$table->string('qualification');
			$table->string('matric_path');
			$table->string('n2_path');
			$table->string('id_path');
			$table->string('cv_path');
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
		Schema::drop('applications');
	}

}
