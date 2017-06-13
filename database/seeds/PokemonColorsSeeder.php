<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonColorsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_colors' );
		
		DB::table( 'pokemon_colors' )->insert( $parser->data );
	}
}
