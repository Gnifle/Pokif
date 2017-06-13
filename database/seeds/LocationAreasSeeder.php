<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationAreasSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'location_areas', true, [ 'identifier' ] );
		
		DB::table( 'location_areas' )->insert( $parser->data );
	}
}
