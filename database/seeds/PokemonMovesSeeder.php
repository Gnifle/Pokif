<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonMovesSeeder extends Seeder {
	
	public function run() {
		
		$column_headers = [ 'pokemon_id', 'version_group_id', 'move_id', 'pokemon_move_method_id', 'level', 'order' ];
		
		/**
		 * Prepared statements can hold a maximum of placeholders equivalent to a 16-bit, unsigned integer (65.535)
		 * So we can calculate the maximum possible batch size by the formula: UINT16_MAX / COLUMN_COUNT
		 *
		 * @see https://stackoverflow.com/questions/4922345/how-many-bind-variables-can-i-use-in-a-sql-query-in-mysql-5/11131824
		 */
		$batch_size = (int) ( 65535 / count( $column_headers ) );
		$offset     = 1;
		
		do {
			
			$parser = new PokifCSVParser( 'pokemon_moves', true, [ 'order' ], $column_headers, $offset, $batch_size );
			
			DB::table( 'pokemon_moves' )->insert( $parser->data );
			
			$offset += $batch_size;
			
		} while( $parser->data );
	}
}
