<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EncounterSlotsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'encounter_slots', true, [ 'slot', 'rarity' ] );
		
		DB::table( 'encounter_slots' )->insert( $parser->data );
	}
}
