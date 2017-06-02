<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder {
	
	public function run() {
		
		$regions_list = pokif_csv_to_seed( 'regions' );
		
		DB::table( 'regions' )->insert( $regions_list );
		
	}
}
