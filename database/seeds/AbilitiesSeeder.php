<?php

use Illuminate\Database\Seeder;

class AbilitiesSeeder extends Seeder {
	
	public function run() {
		
		$ability_list = pokif_csv_to_seed( 'abilities' );
		
		DB::table( 'abilities' )->insert( $ability_list );
	}
}
