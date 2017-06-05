<?php

use Illuminate\Database\Seeder;

class AbilityNamesSeeder extends Seeder {
	
	public function run() {
		
		$ability_name_list = pokif_csv_to_seed( 'ability_names' );
		
		DB::table( 'ability_names' )->insert( $ability_name_list );
	}
}
