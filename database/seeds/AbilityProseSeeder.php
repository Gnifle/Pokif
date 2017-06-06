<?php

use Illuminate\Database\Seeder;

class AbilityProseSeeder extends Seeder {
	
	public function run() {
		
		if( file_exists( base_path() . "/resources/assets/csv/ability_prose_parsed.csv" ) ) {
			
			$ability_prose_list = pokif_csv_to_seed( 'ability_prose_parsed' );
			
		} else {
			
			$ability_prose_list = pokif_csv_to_seed_replace_double_newline( 'ability_prose' );
		}
		
		DB::table( 'ability_prose' )->insert( $ability_prose_list );
	}
}
