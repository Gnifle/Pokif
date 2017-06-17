<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonMovesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_moves', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'move_id' );
			$table->foreign( 'move_id' )->references( 'id' )->on( 'moves' )->onDelete( 'cascade' );
			$table->integer( 'pokemon_move_method_id' );
			$table->foreign( 'pokemon_move_method_id' )->references( 'id' )->on( 'pokemon_move_methods' )->onDelete( 'cascade' );
			$table->integer( 'level' );
			$table->integer( 'order' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_moves' );
	}
}
