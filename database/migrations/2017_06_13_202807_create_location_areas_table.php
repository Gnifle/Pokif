<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationAreasTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'location_areas', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'location_id' );
			$table->foreign( 'location_id' )->references( 'id' )->on( 'locations' )->onDelete( 'cascade' );
			$table->integer( 'game_index' );
			$table->string( 'identifier' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'location_areas' );
	}
}
