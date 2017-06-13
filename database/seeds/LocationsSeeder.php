<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'locations', true, [ 'region_id' ] );
		
		DB::table( 'locations' )->insert( $parser->data );
	}
}
