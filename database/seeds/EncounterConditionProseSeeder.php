<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_condition_prose' );
		
		DB::table( 'encounter_condition_prose' )->insert( $parser->data );
	}
}
