<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokedexVersionGroupsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokedex_version_groups', function( Blueprint $table ) {
			
			$table->integer( 'pokedex_id' );
			$table->foreign( 'pokedex_id' )->references( 'id' )->on( 'pokedexes' )->onDelete( 'cascade' );
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokedex_version_groups' );
	}
}
