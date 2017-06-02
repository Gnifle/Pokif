<?php

use Illuminate\Database\Seeder;

class PokemonDexNumbersTableSeeder extends Seeder {
	
	public function run() {
		
		$pokemon_dex_numbers_list = pokif_csv_to_seed( 'pokemon_dex_numbers' );
		
		DB::table( 'pokemon_dex_numbers' )->insert( $pokemon_dex_numbers_list );
	}
}
