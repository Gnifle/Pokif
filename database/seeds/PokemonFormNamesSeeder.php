<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonFormNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_form_names', true, [ 'pokemon_name' ] );
		
		DB::table( 'pokemon_form_names' )->insert( $parser->data );
	}
}
