<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncountersSeeder extends Seeder {
	
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
//		fclose( $handle ); var list = $('.channel-list').find('.tune-in-link');
		
		$count = 0;
		$batch_size = 5000; // Batched to chunks of 5.000
		
		// TODO: Find a way to programmatically count CSV lines without including enclosed newlines.
		$linecount = 46532; // Counted manually to save resources.
		
		while( $linecount > 0 ) {
			
//			$limit = $batch_size + ( $count === 0 ? 1 : 0 );
			$offset = $count * $batch_size + 1; /*( $count === 0 ? 1 : 0 );*/
			print_r( 'Muh: ' . $offset );
			
			$parser = new PokifCSVParser( 'encounters', false, NULL, [ 'id', 'version_id', 'location_area_id', 'encounter_slot_id', 'pokemon_id', 'min_level', 'max_level' ], $offset, $batch_size );
			
			DB::table( 'encounters' )->insert( $parser->data );
			
			$count++;
			$linecount -= $batch_size;
		}
		
	}
}
