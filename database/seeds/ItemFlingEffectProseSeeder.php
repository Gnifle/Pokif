<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlingEffectProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_fling_effect_prose' );
		
		DB::table( 'item_fling_effect_prose' )->insert( $parser->data );
	}
}
