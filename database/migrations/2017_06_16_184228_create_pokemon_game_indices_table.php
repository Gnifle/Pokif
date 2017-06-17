<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonGameIndicesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_game_indices', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'version_id' );
			$table->foreign( 'version_id' )->references( 'id' )->on( 'versions' )->onDelete( 'cascade' );
			$table->integer( 'game_index' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_game_indices' );
	}
}
