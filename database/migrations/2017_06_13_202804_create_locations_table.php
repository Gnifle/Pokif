<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'locations', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'region_id' )->nullable();
			$table->foreign( 'region_id' )->references( 'id' )->on( 'regions' )->onDelete( 'cascade' );
			$table->string( 'identifier' )->unique();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'locations' );
	}
}
