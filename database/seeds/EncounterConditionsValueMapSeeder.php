<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionsValueMapSeeder extends Seeder {
	
	public function run() {
		
		$count = 0;
		$batch_size = 5000; // Batched to chunks of 5.000
		
		// TODO: Find a way to programmatically count CSV lines without including enclosed newlines.
		$linecount = 12176; // Counted manually to save resources.
		
		while( $linecount > 0 ) {
			
			$parser = new PokifCSVParser( 'encounter_condition_value_map', false, NULL, [ 'encounter_id', 'encounter_condition_value_id' ], $count * $batch_size, $batch_size - 1 );
			
			DB::table( 'encounter_condition_value_map' )->insert( $parser->data );
			
			$count++;
			$linecount -= $batch_size;
		}
	}
}
