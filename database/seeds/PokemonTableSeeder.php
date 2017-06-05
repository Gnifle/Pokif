<?php

use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder {
	
	public function run() {
		
		$pokemon_list = pokif_csv_to_seed( 'pokemon' );
		
		DB::table( 'pokemon' )->insert( $pokemon_list );
	}
	
}