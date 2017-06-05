<?php

use Illuminate\Database\Seeder;

class VersionGroupRegionsSeeder extends Seeder {
	
	public function run() {
		
		$version_group_region_list = pokif_csv_to_seed( 'version_group_regions' );
		
		DB::table( 'version_group_regions' )->insert( $version_group_region_list );
	}
}
