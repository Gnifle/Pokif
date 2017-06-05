<?php

use Illuminate\Database\Seeder;

class RegionNamesSeeder extends Seeder {
	
	public function run() {
		
		$region_name_list = pokif_csv_to_seed( 'region_names' );
		
		DB::table( 'region_names' )->insert( $region_name_list );
	}
}
