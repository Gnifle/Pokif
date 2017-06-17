<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonItemsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_items' );
		
		DB::table( 'pokemon_items' )->insert( $parser->data );
	}
}
