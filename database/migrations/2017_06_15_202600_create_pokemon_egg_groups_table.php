<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonEggGroupsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_egg_groups', function( Blueprint $table ) {
			
			$table->integer( 'species_id' );
			$table->foreign( 'species_id' )->references( 'id' )->on( 'pokemon_species' )->onDelete( 'cascade' );
			$table->integer( 'egg_group_id' );
			$table->foreign( 'egg_group_id' )->references( 'id' )->on( 'egg_groups' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_egg_groups' );
	}
}
