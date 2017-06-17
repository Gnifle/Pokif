<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterConditionValueProseTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'encounter_condition_value_prose', function( Blueprint $table ) {
			
			$table->integer( 'encounter_condition_value_id' );
			$table->foreign( 'encounter_condition_value_id', 'ec_value_prose_ec_id_foreign' )->references( 'id' )->on( 'encounter_condition_values' )->onDelete( 'cascade' );
			$table->integer( 'local_language_id' );
			$table->foreign( 'local_language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->string( 'name' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'encounter_condition_value_prose' );
	}
}
