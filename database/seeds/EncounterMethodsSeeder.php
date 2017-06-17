<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterMethodsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_methods' );
		
		DB::table( 'encounter_methods' )->insert( $parser->data );
	}
}
