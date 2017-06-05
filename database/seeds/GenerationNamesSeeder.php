<?php

use Illuminate\Database\Seeder;

class GenerationNamesSeeder extends Seeder {
	
	public function run() {
		
		$generation_name_list = pokif_csv_to_seed( 'generation_names' );
		
		DB::table( 'generation_names' )->insert( $generation_name_list );
	}
}
