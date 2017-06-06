<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class VersionGroupPokemonMoveMethodsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'version_group_pokemon_move_methods' );
		
		DB::table( 'version_group_pokemon_move_methods' )->insert( $parser->data );
	}
}
