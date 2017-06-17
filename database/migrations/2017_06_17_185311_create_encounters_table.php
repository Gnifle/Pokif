<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncountersTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'encounters', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'version_id' );
			$table->foreign( 'version_id' )->references( 'id' )->on( 'versions' )->onDelete( 'cascade' );
			$table->integer( 'location_area_id' );
			$table->foreign( 'location_area_id' )->references( 'id' )->on( 'location_areas' )->onDelete( 'cascade' );
			$table->integer( 'encounter_slot_id' );
			$table->foreign( 'encounter_slot_id' )->references( 'id' )->on( 'encounter_slots' )->onDelete( 'cascade' );
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->tinyInteger( 'min_level' );
			$table->tinyInteger( 'max_level' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'encounters' );
	}
}
