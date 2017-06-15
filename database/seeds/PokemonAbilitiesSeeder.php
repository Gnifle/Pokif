<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonAbilitiesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_abilities' );
		
		DB::table( 'pokemon_abilities' )->insert( $parser->data );
	}
}
