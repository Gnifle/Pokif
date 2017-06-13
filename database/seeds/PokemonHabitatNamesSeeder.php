<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonHabitatNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_habitat_names' );
		
		DB::table( 'pokemon_habitat_names' )->insert( $parser->data );
	}
}
