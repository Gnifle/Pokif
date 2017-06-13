<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonShapeProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_shape_prose' );
		
		DB::table( 'pokemon_shape_prose' )->insert( $parser->data );
	}
}
