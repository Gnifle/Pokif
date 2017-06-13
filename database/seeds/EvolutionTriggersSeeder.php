<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EvolutionTriggersSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'evolution_triggers' );
		
		DB::table( 'evolution_triggers' )->insert( $parser->data );
	}
}
