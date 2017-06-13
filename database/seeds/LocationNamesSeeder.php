<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'location_names' );
		
		DB::table( 'location_names' )->insert( $parser->data );
	}
}
