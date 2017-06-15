<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonEvolutionTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_evolution', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'evolved_species_id' );
			$table->foreign( 'evolved_species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->integer( 'evolution_trigger_id' );
			$table->foreign( 'evolution_trigger_id' )->references( 'id' )->on( 'evolution_triggers' )->onDelete( 'cascade' );
			$table->integer( 'trigger_item_id' )->nullable();
			$table->foreign( 'trigger_item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->integer( 'minimum_level' )->nullable();
			$table->integer( 'gender_id' )->nullable();
			$table->foreign( 'gender_id' )->references( 'id' )->on( 'genders' )->onDelete( 'cascade' );
			$table->integer( 'location_id' )->nullable();
			$table->foreign( 'location_id' )->references( 'id' )->on( 'locations' )->onDelete( 'cascade' );
			$table->integer( 'held_item_id' )->nullable();
			$table->foreign( 'held_item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->string( 'time_of_day' )->nullable();
			$table->integer( 'known_move_id' )->nullable();
			$table->foreign( 'known_move_id' )->references( 'id' )->on( 'moves' )->onDelete( 'cascade' );
			$table->integer( 'known_move_type_id' )->nullable();
			$table->foreign( 'known_move_type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->integer( 'minimum_happiness' )->nullable();
			$table->integer( 'minimum_beauty' )->nullable();
			$table->integer( 'minimum_affection' )->nullable();
			$table->tinyInteger( 'relative_physical_stats' )->nullable();
			$table->integer( 'party_species_id' )->nullable();
			$table->foreign( 'party_species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->integer( 'party_type_id' )->nullable();
			$table->foreign( 'party_type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->integer( 'trade_species_id' )->nullable();
			$table->foreign( 'trade_species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->boolean( 'needs_overworld_rain' );
			$table->boolean( 'turn_upside_down' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_evolution' );
	}
}
