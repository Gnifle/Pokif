<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonHabitatsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_habitats' );
		
		DB::table( 'pokemon_habitats' )->insert( $parser->data );
	}
}
