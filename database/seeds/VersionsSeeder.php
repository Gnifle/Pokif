<?php

use Illuminate\Database\Seeder;

class VersionsSeeder extends Seeder {
	
	public function run() {
		
		$version_list = pokif_csv_to_seed( 'versions' );
		
		DB::table( 'versions' )->insert( $version_list );
	}
}
