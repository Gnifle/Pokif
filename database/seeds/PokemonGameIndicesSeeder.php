<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonGameIndicesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_game_indices' );
		
		DB::table( 'pokemon_game_indices' )->insert( $parser->data );
	}
}
