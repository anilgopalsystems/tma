<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('org_id');
			$table->string('asset_key',50);
			$table->string('asset_name',50);
			$table->string('category',50);
			$table->date('purchased_on');
			$table->string('assign_to',50);
			$table->string('description',1000);
			$table->string('quantity',10);
			$table->integer('location');
			$table->integer('department');
			$table->string('manufacturer',100);
			$table->string('asset_value',100);
			$table->string('modelnumber',100);
			$table->string('asset_serial',100);
			$table->integer('isactive');
			$table->string('grn_number',100);
			$table->string('parent_asset',100);
			$table->string('iswarranty',10);
			$table->string('issla',10);
			$table->string('isinsurance',10);
			$table->datetime('last_updated_datetime');
			$table->integer('last_updated_by');
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
		Schema::drop('assets');
	}

}
