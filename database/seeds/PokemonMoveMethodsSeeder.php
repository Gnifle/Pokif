<?php

use Illuminate\Database\Seeder;

class PokemonMoveMethodsSeeder extends Seeder {
	
	public function run() {
		
		$pokemon_move_method_list = pokif_csv_to_seed( 'pokemon_move_methods' );
		
		DB::table( 'pokemon_move_methods' )->insert( $pokemon_move_method_list );
	}
}
