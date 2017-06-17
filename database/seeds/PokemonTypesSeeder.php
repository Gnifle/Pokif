<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonTypesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_types' );
		
		DB::table( 'pokemon_types' )->insert( $parser->data );
	}
}
