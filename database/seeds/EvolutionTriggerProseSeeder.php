<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EvolutionTriggerProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'evolution_trigger_prose' );
		
		DB::table( 'evolution_trigger_prose' )->insert( $parser->data );
	}
}
