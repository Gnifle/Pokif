<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokedexProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokedex_prose', true, [ 'description' ] );
		
		DB::table( 'pokedex_prose' )->insert( $parser->data );
	}
}
