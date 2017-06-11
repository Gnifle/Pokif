<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlingEffectsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_fling_effects' );
		
		DB::table( 'item_fling_effects' )->insert( $parser->data );
	}
}
