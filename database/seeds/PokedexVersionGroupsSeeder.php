<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokedexVersionGroupsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokedex_version_groups' );
		
		DB::table( 'pokedex_version_groups' )->insert( $parser->data );
	}
}
