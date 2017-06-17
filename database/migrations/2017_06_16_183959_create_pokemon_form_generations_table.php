<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonFormGenerationsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_form_generations', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_form_id' );
			$table->foreign( 'pokemon_form_id' )->references( 'id' )->on( 'pokemon_forms' )->onDelete( 'cascade' );
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
		
		Schema::dropIfExists( 'pokemon_form_generations' );
	}
}
