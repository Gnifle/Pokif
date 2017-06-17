<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationAreaEncounterRatesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'location_area_encounter_rates', function( Blueprint $table ) {
			
			$table->integer( 'location_area_id' );
			$table->foreign( 'location_area_id' )->references( 'id' )->on( 'location_areas' )->onDelete( 'cascade' );
			$table->integer( 'encounter_method_id' );
			$table->foreign( 'encounter_method_id' )->references( 'id' )->on( 'encounter_methods' )->onDelete( 'cascade' );
			$table->integer( 'version_id' );
			$table->foreign( 'version_id' )->references( 'id' )->on( 'versions' )->onDelete( 'cascade' );
			$table->integer( 'rate' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'location_area_encounter_rates' );
	}
}
