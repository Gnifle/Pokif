<?php

use Illuminate\Database\Seeder;

class LanguageNamesSeeder extends Seeder {
	
	public function run() {
		
		$language_name_list = pokif_csv_to_seed( 'language_names' );
		
		DB::table( 'language_names' )->insert( $language_name_list );
	}
}
