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
		
		Schema::create( 'pokedex', function( Blueprint $table ) {
			
			$table->integer( 'key' )->unique();
			$table->string( 'slug' )->unique();
			$table->string( 'name' );
			
		} );
		
		Schema::create( 'pokedex_entries', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'pokemon_number' );
			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->integer( 'pokedex_key' );
			$table->foreign( 'pokedex_key' )->references( 'key' )->on( 'pokedex' )->onDelete( 'cascade' );
			
		} );
		
		Schema::create( 'stats', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->string( 'slug' )->unique();
			$table->string( 'name' );
			$table->string( 'name_abbr' );
			
		} );
		
		Schema::create( 'pokemon_stats', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'pokemon_number' );
			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
			$table->string( 'stat_slug' );
			$table->foreign( 'stat_slug' )->references( 'slug' )->on( 'stats' )->onDelete( 'cascade' );
			$table->integer( 'pokedex_generation' );
			$table->foreign( 'pokedex_generation' )->references( 'key' )->on( 'pokedex' )->onDelete( 'cascade' );
			$table->integer( 'value' );
			
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'pokedex_entries' );
		Schema::dropIfExists( 'pokemon_names' );
		Schema::dropIfExists( 'ability_names' );
		Schema::dropIfExists( 'pokemon_abilities' );
		Schema::dropIfExists( 'pokemon_stats' );
		Schema::dropIfExists( 'egg_group' );
		Schema::dropIfExists( 'pokemon' );
		Schema::dropIfExists( 'pokedex' );
		Schema::dropIfExists( 'ability' );
		Schema::dropIfExists( 'stats' );
	}
}
