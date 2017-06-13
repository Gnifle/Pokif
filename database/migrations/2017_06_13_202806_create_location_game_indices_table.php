<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationGameIndicesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'location_game_indices', function( Blueprint $table ) {
			
			$table->integer( 'location_id' );
			$table->foreign( 'location_id' )->references( 'id' )->on( 'locations' )->onDelete( 'cascade' );
			$table->integer( 'generation_id' );
			$table->foreign( 'generation_id' )->references( 'id' )->on( 'generations' )->onDelete( 'cascade' );
			$table->integer( 'game_index' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'location_game_indices' );
	}
}
