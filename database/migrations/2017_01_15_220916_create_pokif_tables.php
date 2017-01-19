<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokifTables extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon', function( Blueprint $table ) {
			
			$table->integer( 'number' )->unique();
			$table->string( 'name' )->unique();
			$table->string( 'slug' )->unique();
			$table->integer( 'base_exp' );
			$table->float( 'height' );
			$table->float( 'weight' );
			$table->integer( 'base_happiness' );
			$table->integer( 'capture_rate' );
			$table->boolean( 'forms_switchable' );
			$table->integer( 'gender_rate' );
			$table->string( 'classification' );
			$table->string( 'exp_growth_rate' );
			$table->boolean( 'has_gender_differences' );
			$table->integer( 'hatch_counter' );
			$table->boolean( 'is_baby' );
			$table->boolean( 'has_varieties' );
			$table->timestamps();
			
		} );
		
		Schema::create( 'pokemon_names', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_number' );
			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->string( 'locale' );
			$table->string( 'name' );
			
		} );
		
		Schema::create( 'ability', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'api_id' );
			$table->string( 'name' );
			$table->string( 'slug' );
			$table->integer( 'generation' );
			$table->string( 'flavor_text' );
			$table->string( 'effect_text' );
			
		} );
		
		Schema::create( 'ability_names', function( Blueprint $table ) {
			
			$table->integer( 'ability_id' )->unsigned();
			$table->foreign( 'ability_id' )->references( 'id' )->on( 'ability' )->onDelete( 'cascade' );
			$table->string( 'locale' );
			$table->string( 'name' );
			
		} );
		
		Schema::create( 'pokemon_abilities', function( Blueprint $table ) {
			
			$table->integer( 'pokemon_number' );
			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'ability_id' )->unsigned();
			$table->foreign( 'ability_id' )->references( 'id' )->on( 'ability' )->onDelete( 'cascade' );
			
		} );
		
		Schema::create( 'egg_group', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'api_id' );
			$table->string( 'name' );
			$table->string( 'slug' );
			
		} );
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'pokemon' );
		Schema::dropIfExists( 'ability' );
	}
}
