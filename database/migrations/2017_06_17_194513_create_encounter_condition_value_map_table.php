<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterConditionValueMapTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'encounter_condition_value_map', function( Blueprint $table ) {
			
			$table->integer( 'encounter_id' );
			$table->foreign( 'encounter_id' )->references( 'id' )->on( 'encounters' )->onDelete( 'cascade' );
			$table->integer( 'encounter_condition_value_id' );
			$table->foreign( 'encounter_condition_value_id', 'ec_value_map_ec_id_foreign' )->references( 'id' )->on( 'encounter_condition_values' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'encounter_condition_value_map' );
	}
}
