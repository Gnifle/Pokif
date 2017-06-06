<?php

use Illuminate\Database\Seeder;

class AbilityFlavorTextSeeder extends Seeder {
	
	public function run() {
		
		$ability_flavor_text_list = pokif_csv_to_seed_replace_double_newline( 'ability_flavor_text' );
		
		DB::table( 'ability_flavor_text' )->insert( $ability_flavor_text_list );
	}
}
