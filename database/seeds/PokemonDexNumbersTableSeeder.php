<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonDexNumbersTableSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_dex_numbers' );
		
		DB::table( 'pokemon_dex_numbers' )->insert( $parser->data );
	}
}
