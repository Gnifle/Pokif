<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonFormSpritesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_form_sprites', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'pokemon_form_id' );
			$table->foreign( 'pokemon_form_id' )->references( 'id' )->on( 'pokemon_forms' )->onDelete( 'cascade' );
			$table->longText( 'sprites' )->comment = 'JSON encoded array of sprites';
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_form_sprites' );
	}
}
