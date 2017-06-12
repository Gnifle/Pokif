<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemGameIndicesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_game_indices' );
		
		DB::table( 'item_game_indices' )->insert( $parser->data );
	}
}
