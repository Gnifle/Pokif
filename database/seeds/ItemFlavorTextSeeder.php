<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlavorTextSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_flavor_text' );
		
		DB::table( 'item_flavor_text' )->insert( $parser->data );
	}
}
