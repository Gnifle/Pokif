<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EvolutionChainsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'evolution_chains', true, [ 'baby_trigger_item_id' ] );
		
		DB::table( 'evolution_chains' )->insert( $parser->data );
	}
}
