<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncountersSeeder extends Seeder {
	
	public function run() {
		
		$column_headers = [ 'id', 'version_id', 'location_area_id', 'encounter_slot_id', 'pokemon_id', 'min_level', 'max_level' ];
		
		/**
		 * Prepared statements can hold a maximum of placeholders equivalent to a 16-bit, unsigned integer (65.535)
		 * So we can calculate the maximum possible batch size by the formula: UINT16_MAX / COLUMN_COUNT
		 *
		 * @see https://stackoverflow.com/questions/4922345/how-many-bind-variables-can-i-use-in-a-sql-query-in-mysql-5/11131824
		 */
		$batch_size = (int) ( 65535 / count( $column_headers ) );
		$offset     = 1;
		
		do {
			
			$parser = new PokifCSVParser( 'encounters', false, [], $column_headers, $offset, $batch_size );
			
			DB::table( 'encounters' )->insert( $parser->data );
			
			$offset += $batch_size;
			
		} while( $parser->data );
	}
}
