<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemPocketsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_pockets' );
		
		DB::table( 'item_pockets' )->insert( $parser->data );
	}
}
