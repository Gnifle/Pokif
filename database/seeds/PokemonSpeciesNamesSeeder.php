<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonSpeciesNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_species_names', true, [ 'genus' ] );
		
		DB::table( 'pokemon_species_names' )->insert( $parser->data );
	}
}
