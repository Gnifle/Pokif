<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonFormsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon_forms', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->string( 'form_identifier' )->nullable();
			$table->integer( 'pokemon_id' );
			$table->foreign( 'pokemon_id' )->references( 'id' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'introduced_in_version_group_id' );
			$table->foreign( 'introduced_in_version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->boolean( 'is_default' );
			$table->boolean( 'is_battle_only' );
			$table->boolean( 'is_mega' );
			$table->tinyInteger( 'form_order' );
			$table->integer( 'order' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokemon_forms' );
	}
}
