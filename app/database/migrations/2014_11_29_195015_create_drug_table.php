<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drugs', function($table) {

        $table->increments('id');
		$table->timestamps();

		$table->string('drug_NM');
		$table->integer('dose_ID')->unsigned();

		
		$table->foreign('dose_ID')->references('id')->on('dose');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('drug');
	}

}
