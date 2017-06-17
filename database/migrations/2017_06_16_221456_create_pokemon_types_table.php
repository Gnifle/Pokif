<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTypesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_types', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'type_id' );
			$table->foreign( 'type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->tinyInteger( 'slot' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_types' );
	}
}
