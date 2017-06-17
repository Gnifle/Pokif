<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonStatsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_stats' );
		
		DB::table( 'pokemon_stats' )->insert( $parser->data );
	}
}
