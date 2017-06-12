<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveMetaTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'move_meta', function( Blueprint $table ) {
			
			$table->integer( 'move_id' )->unique();
			$table->integer( 'meta_category_id' );
			$table->foreign( 'meta_category_id' )->references( 'id' )->on( 'move_meta_categories' )->onDelete( 'cascade' );
			$table->integer( 'meta_ailment_id' );
			$table->foreign( 'meta_ailment_id' )->references( 'id' )->on( 'move_meta_ailments' )->onDelete( 'cascade' );
			$table->tinyInteger( 'min_hits' )->nullable();
			$table->tinyInteger( 'max_hits' )->nullable();
			$table->tinyInteger( 'min_turns' )->nullable();
			$table->tinyInteger( 'max_turns' )->nullable();
			$table->tinyInteger( 'drain' );
			$table->tinyInteger( 'healing' );
			$table->tinyInteger( 'crit_rate' );
			$table->tinyInteger( 'ailment_chance' );
			$table->tinyInteger( 'flinch_chance' );
			$table->tinyInteger( 'stat_chance' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'move_meta' );
	}
}
