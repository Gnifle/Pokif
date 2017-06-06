<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonMoveMethodsTable extends Migration {
	
	public function up() {
		
		Schema::create( 'pokemon_move_methods', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' );
		} );
	}
	
	public function down() {
		
		Schema::dropIfExists( 'pokemon_move_methods' );
	}
}
