<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonMoveMethodProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_move_method_prose' );
		
		DB::table( 'pokemon_move_method_prose' )->insert( $parser->data );
	}
}
