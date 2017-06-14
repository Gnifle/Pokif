<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonSpeciesFlavorTextSeeder extends Seeder {
	
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
		
		// TODO: Find a way to programmatically count CSV lines without including enclosed newlines.
		$linecount = 32568; // Counted manually to save resources.
		
		while( $linecount > 0 ) {
			
			$parser = new PokifCSVParser( 'pokemon_species_flavor_text', false, [], [ 'species_id', 'version_id', 'language_id', 'flavor_text' ], $count * 1000, 1000 );
			
			DB::table( 'pokemon_species_flavor_text' )->insert( $parser->data );
			
			$count++;
			$linecount -= 1000;
		}
		
	}
}
