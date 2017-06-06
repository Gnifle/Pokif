<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokedexesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokedexes', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'region_id' )->nullable();
			$table->foreign( 'region_id' )->references( 'id' )->on( 'regions' )->onDelete( 'cascade' );
			$table->string( 'identifier' )->unique();
			$table->boolean( 'is_main_series' );
			
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokedexes' );
	}
}
