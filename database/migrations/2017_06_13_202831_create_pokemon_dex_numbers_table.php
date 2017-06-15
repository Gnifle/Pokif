<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonDexNumbersTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_dex_numbers', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'species_id' );
			$table->integer( 'pokedex_id' );
			$table->foreign( 'pokedex_id' )->references( 'id' )->on( 'pokedexes' )->onDelete( 'cascade' );
			$table->integer( 'pokedex_number' );
			
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_dex_numbers' );
	}
}
