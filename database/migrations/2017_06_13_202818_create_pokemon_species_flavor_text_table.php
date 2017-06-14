<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonSpeciesFlavorTextTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_species_flavor_text', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'species_id' );
			$table->foreign( 'species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->integer( 'version_id' );
			$table->foreign( 'version_id' )->references( 'id' )->on( 'versions' )->onDelete( 'cascade' );
			$table->integer( 'language_id' );
			$table->foreign( 'language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->string( 'flavor_text' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_species_flavor_text' );
	}
}
