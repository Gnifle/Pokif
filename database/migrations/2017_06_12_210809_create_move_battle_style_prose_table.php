<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveBattleStyleProseTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'move_battle_style_prose', function( Blueprint $table ) {
			
			$table->integer( 'move_battle_style_id' );
			$table->foreign( 'move_battle_style_id' )->references( 'id' )->on( 'move_battle_styles' )->onDelete( 'cascade' );
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
		
		Schema::dropIfExists( 'move_battle_style_prose' );
	}
}
