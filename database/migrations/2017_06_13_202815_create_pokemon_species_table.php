<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonSpeciesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_species', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->integer( 'generation_id' );
			$table->foreign( 'generation_id' )->references( 'id' )->on( 'generations' )->onDelete( 'cascade' );
			$table->integer( 'evolves_from_species_id' )->nullable();
			$table->integer( 'evolution_chain_id' );
			$table->foreign( 'evolution_chain_id' )->references( 'id' )->on( 'evolution_chains' )->onDelete( 'cascade' );
			$table->integer( 'color_id' );
			$table->foreign( 'color_id' )->references( 'id' )->on( 'pokemon_colors' )->onDelete( 'cascade' );
			$table->integer( 'shape_id' );
			$table->foreign( 'shape_id' )->references( 'id' )->on( 'pokemon_shapes' )->onDelete( 'cascade' );
			$table->integer( 'habitat_id' )->nullable();
			$table->foreign( 'habitat_id' )->references( 'id' )->on( 'pokemon_habitats' )->onDelete( 'cascade' );
			$table->tinyInteger( 'gender_rate' );
			$table->integer( 'capture_rate' );
			$table->integer( 'base_happiness' );
			$table->boolean( 'is_baby' );
			$table->integer( 'hatch_counter' );
			$table->boolean( 'has_gender_differences' );
			$table->integer( 'growth_rate_id' );
			$table->foreign( 'growth_rate_id' )->references( 'id' )->on( 'growth_rates' )->onDelete( 'cascade' );
			$table->boolean( 'forms_switchable' );
			$table->integer( 'order' );
			$table->integer( 'conquest_order' )->nullable();
			
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_species' );
	}
}
