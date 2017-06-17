<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterSlotsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'encounter_slots', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'encounter_method_id' );
			$table->foreign( 'encounter_method_id' )->references( 'id' )->on( 'encounter_methods' )->onDelete( 'cascade' );
			$table->integer( 'slot' )->nullable();
			$table->integer( 'rarity' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'encounter_slots' );
	}
}
