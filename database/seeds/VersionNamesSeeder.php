<?php

use Illuminate\Database\Seeder;

class VersionNamesSeeder extends Seeder {
	
	public function run() {
		
		$version_name_list = pokif_csv_to_seed( 'version_names' );
		
		DB::table( 'version_names' )->insert( $version_name_list );
	}
}
