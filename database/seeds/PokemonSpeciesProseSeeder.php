<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonSpeciesProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_species_prose' );
		
		DB::table( 'pokemon_species_prose' )->insert( $parser->data );
	}
}
