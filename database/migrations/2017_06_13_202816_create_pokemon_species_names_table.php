<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonSpeciesNamesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_species_names', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_species_id' );
			$table->foreign( 'pokemon_species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->integer( 'local_language_id' );
			$table->foreign( 'local_language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->string( 'name' );
			$table->string( 'genus' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_species_names' );
	}
}
