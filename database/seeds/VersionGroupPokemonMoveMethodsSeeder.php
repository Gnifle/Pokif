<?php

use Illuminate\Database\Seeder;

class VersionGroupPokemonMoveMethodsSeeder extends Seeder {
	
	public function run() {
		
		$version_group_pokemon_move_method_list = pokif_csv_to_seed( 'version_group_pokemon_move_methods' );
		
		DB::table( 'version_group_pokemon_move_methods' )->insert( $version_group_pokemon_move_method_list );
	}
}
