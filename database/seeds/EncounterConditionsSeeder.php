<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_conditions' );
		
		DB::table( 'encounter_conditions' )->insert( $parser->data );
	}
}
