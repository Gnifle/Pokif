<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationAreaEncounterRatesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'location_area_encounter_rates' );
		
		DB::table( 'location_area_encounter_rates' )->insert( $parser->data );
	}
}
