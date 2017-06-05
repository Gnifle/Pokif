<?php

use Illuminate\Database\Seeder;

class PokemonMoveMethodProseSeeder extends Seeder {
	
	public function run() {
		
		$pokemon_move_method_prose_list = pokif_csv_to_seed( 'pokemon_move_method_prose' );
		
		DB::table( 'pokemon_move_method_prose' )->insert( $pokemon_move_method_prose_list );
	}
}
