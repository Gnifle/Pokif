<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionsValuesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_condition_values' );
		
		DB::table( 'encounter_condition_values' )->insert( $parser->data );
	}
}
