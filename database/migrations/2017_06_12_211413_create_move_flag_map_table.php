<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveFlagMapTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'move_flag_map', function( Blueprint $table ) {
			
			$table->integer( 'move_id' );
			$table->foreign( 'move_id' )->references( 'id' )->on( 'moves' )->onDelete( 'cascade' );
			$table->integer( 'move_flag_id' );
			$table->foreign( 'move_flag_id' )->references( 'id' )->on( 'move_flags' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'move_flag_map' );
	}
}
