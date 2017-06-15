<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonEggGroupsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_egg_groups' );
		
		DB::table( 'pokemon_egg_groups' )->insert( $parser->data );
	}
}
