<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonSpeciesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_species', true, [ 'evolves_from_species_id', 'habitat_id', 'conquest_order' ] );
		
		DB::table( 'pokemon_species' )->insert( $parser->data );
	}
}
