<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterMethodProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_method_prose' );
		
		DB::table( 'encounter_method_prose' )->insert( $parser->data );
	}
}
