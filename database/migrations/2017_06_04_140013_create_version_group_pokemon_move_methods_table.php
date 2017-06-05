<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionGroupPokemonMoveMethodsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'version_group_pokemon_move_methods', function( Blueprint $table ) {
			
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id', 'vg_pokemon_move_methods_vg_id_foreign' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'pokemon_move_method_id' );
			$table->foreign( 'pokemon_move_method_id', 'vg_pokemon_move_methods_pokemon_move_method_id_foreign' )->references( 'id' )->on( 'pokemon_move_methods' )->onDelete( 'cascade' );
			
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'version_group_pokemon_move_methods' );
	}
}
