<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokedexTableSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokedexes', true, [ 'region_id' ] );
		
		DB::table( 'pokedexes' )->insert( $parser->data );
	}
}
