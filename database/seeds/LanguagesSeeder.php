<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder {
	
	public function run() {
		
		$language_list = pokif_csv_to_seed( 'languages' );
		
		DB::table( 'languages' )->insert( $language_list );
	}
}
