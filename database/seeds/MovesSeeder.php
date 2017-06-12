<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MovesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'moves', true, [ 'power', 'pp', 'accuracy', 'effect_chance', 'contest_type_id', 'contest_effect_id', 'super_contest_effect_id' ] );
		
		DB::table( 'moves' )->insert( $parser->data );
	}
}
