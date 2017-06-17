<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonItemsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_items', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'version_id' );
			$table->foreign( 'version_id' )->references( 'id' )->on( 'versions' )->onDelete( 'cascade' );
			$table->integer( 'item_id' );
			$table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->integer( 'rarity' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_items' );
	}
}
