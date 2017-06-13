<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokedexesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokedexes', true, [ 'region_id' ] );
		
		DB::table( 'pokedexes' )->insert( $parser->data );
	}
}
