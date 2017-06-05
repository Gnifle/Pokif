<?php

use Illuminate\Database\Seeder;

class VersionGroupsSeeder extends Seeder {
	
	public function run() {
		
		$version_group_list = pokif_csv_to_seed( 'version_groups' );
		
		DB::table( 'version_groups' )->insert( $version_group_list );
	}
}
