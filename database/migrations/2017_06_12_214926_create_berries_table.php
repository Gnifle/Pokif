<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerriesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'berries', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'item_id' );
			$table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->integer( 'firmness_id' );
			$table->foreign( 'firmness_id' )->references( 'id' )->on( 'berry_firmness' )->onDelete( 'cascade' );
			$table->tinyInteger( 'natural_gift_power' );
			$table->integer( 'natural_gift_type_id' );
			$table->mediumInteger( 'size' );
			$table->integer( 'max_harvest' );
			$table->integer( 'growth_time' );
			$table->integer( 'soil_dryness' );
			$table->integer( 'smoothness' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'berries' );
	}
}
