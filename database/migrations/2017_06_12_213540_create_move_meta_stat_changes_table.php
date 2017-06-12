<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveMetaStatChangesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'move_meta_stat_changes', function( Blueprint $table ) {
			
			$table->integer( 'move_id' );
			$table->foreign( 'move_id' )->references( 'id' )->on( 'moves' )->onDelete( 'cascade' );
			$table->integer( 'stat_id' );
			$table->foreign( 'stat_id' )->references( 'id' )->on( 'stats' )->onDelete( 'cascade' );
			$table->integer( 'change' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'move_meta_stat_changes' );
	}
}
