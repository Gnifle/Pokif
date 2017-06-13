<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LocationGameIndicesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'location_game_indices' );
		
		DB::table( 'location_game_indices' )->insert( $parser->data );
	}
}
