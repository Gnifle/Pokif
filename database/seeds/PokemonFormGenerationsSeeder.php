<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonFormGenerationsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_form_generations' );
		
		DB::table( 'pokemon_form_generations' )->insert( $parser->data );
	}
}
