<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterConditionsValueMapSeeder extends Seeder {
	
	public function run() {
		
		$column_headers = [ 'encounter_id', 'encounter_condition_value_id' ];
		
		/**
		 * Prepared statements can hold a maximum of placeholders equivalent to a 16-bit, unsigned integer (65.535)
		 * So we can calculate the maximum possible batch size by the formula: UINT16_MAX / COLUMN_COUNT
		 *
		 * @see https://stackoverflow.com/questions/4922345/how-many-bind-variables-can-i-use-in-a-sql-query-in-mysql-5/11131824
		 */
		$batch_size = (int) ( 65535 / count( $column_headers ) );
		$offset     = 1;
		
		do {
			
			$parser = new PokifCSVParser( 'encounter_condition_value_map', false, [], $column_headers, $offset, $batch_size );
			
			DB::table( 'encounter_condition_value_map' )->insert( $parser->data );
			
			$offset += $batch_size;
			
		} while( $parser->data );
	}
}
