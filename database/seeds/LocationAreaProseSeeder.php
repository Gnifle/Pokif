<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationAreaProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'location_area_prose', true, [ 'name' ] );
		
		DB::table( 'location_area_prose' )->insert( $parser->data );
	}
}
