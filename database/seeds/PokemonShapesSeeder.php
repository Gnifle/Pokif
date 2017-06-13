<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonShapesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_shapes' );
		
		DB::table( 'pokemon_shapes' )->insert( $parser->data );
	}
}
