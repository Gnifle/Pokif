<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeEfficacyTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'type_efficacy', function( Blueprint $table ) {
			
			$table->integer( 'damage_type_id' );
			$table->foreign( 'damage_type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->integer( 'target_type_id' );
			$table->foreign( 'target_type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->integer( 'damage_factor' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'type_efficacy' );
	}
}
