<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'stats', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'damage_class_id' )->nullable();
			$table->foreign( 'damage_class_id' )->references( 'id' )->on( 'move_damage_classes' )->onDelete( 'cascade' );
			$table->string( 'identifier' )->unique();
			$table->boolean( 'is_battle_only' );
			$table->integer( 'game_index' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'stats' );
	}
}
