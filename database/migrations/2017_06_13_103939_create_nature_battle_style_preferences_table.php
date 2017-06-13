<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNatureBattleStylePreferencesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'nature_battle_style_preferences', function( Blueprint $table ) {
			
			$table->integer( 'nature_id' );
			$table->foreign( 'nature_id' )->references( 'id' )->on( 'natures' )->onDelete( 'cascade' );
			$table->integer( 'move_battle_style_id' );
			$table->foreign( 'move_battle_style_id' )->references( 'id' )->on( 'move_battle_styles' )->onDelete( 'cascade' );
			$table->integer( 'low_hp_preference' );
			$table->integer( 'high_hp_preference' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'nature_battle_style_preferences' );
	}
}
