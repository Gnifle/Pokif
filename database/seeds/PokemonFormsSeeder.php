<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonFormsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_forms', true, [ 'form_identifier' ] );
		
		DB::table( 'pokemon_forms' )->insert( $parser->data );
	}
}
