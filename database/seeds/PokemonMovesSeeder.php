<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonMovesSeeder extends Seeder {
	
	public function run() {

//		Count total amount of lines in file. Resulted in around 96.000 last time since enclosed linebreaks are counted.
//		Using this line count works, but results in parsing taking ~200 secs instead of ~50 when counted manually.
//		$file      = base_path() . "/resources/assets/csv/pokemon_species_flavor_text.csv";
//		$linecount = 0;
//		$handle    = fopen( $file, "r" );
//		while( ! feof( $handle ) ) {
//			$line = fgets( $handle );
//			$linecount ++;
//		}
//		fclose( $handle );
		
		$count = 0;
		$batch_size = 5000;
		
		// TODO: Find a way to programmatically count CSV lines without including enclosed newlines.
		$linecount = 366542; // Counted manually to save resources.
		
		while( $linecount > 0 ) {
			
			$parser = new PokifCSVParser( 'pokemon_moves', true, [ 'order' ], [ 'pokemon_id', 'version_group_id', 'move_id', 'pokemon_move_method_id', 'level', 'order' ], $count * $batch_size, $batch_size );
			
			DB::table( 'pokemon_moves' )->insert( $parser->data );
			
			$count++;
			$linecount -= $batch_size;
		}
		
	}
}
