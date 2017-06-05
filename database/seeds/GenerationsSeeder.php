<?php

use Illuminate\Database\Seeder;

class GenerationsSeeder extends Seeder {
	
	public function run() {
		
		$generations_list = pokif_csv_to_seed( 'generations' );
		
		DB::table( 'generations' )->insert( $generations_list );
	}
}
