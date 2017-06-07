<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class StatsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'stats', true, [ 'damage_class_id', 'game_index' ] );
		
		DB::table( 'stats' )->insert( $parser->data );
	}
}
