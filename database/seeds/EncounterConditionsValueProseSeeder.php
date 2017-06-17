<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionsValueProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_condition_value_prose' );
		
		DB::table( 'encounter_condition_value_prose' )->insert( $parser->data );
	}
}
