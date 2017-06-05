<?php

use Illuminate\Database\Seeder;

class AbilityProseSeeder extends Seeder {
	
	public function run() {
		
//		$ability_prose_list = pokif_csv_to_seed( 'ability_prose' );
		$ability_prose_list = pokif_csv_to_seed_replace_double_newline( 'ability_prose' );
		
		DB::table( 'ability_prose' )->insert( $ability_prose_list );
	}
}
