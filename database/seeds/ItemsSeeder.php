<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'items', true, [ 'fling_power', 'fling_effect_id' ] );
		
		DB::table( 'items' )->insert( $parser->data );
	}
}
