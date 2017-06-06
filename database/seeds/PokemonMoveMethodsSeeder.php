<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonMoveMethodsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_move_methods' );
		
		DB::table( 'pokemon_move_methods' )->insert( $parser->data );
	}
}
