<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonColorNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_color_names' );
		
		DB::table( 'pokemon_color_names' )->insert( $parser->data );
	}
}
