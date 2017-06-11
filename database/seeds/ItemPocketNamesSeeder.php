<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemPocketNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_pocket_names' );
		
		DB::table( 'item_pocket_names' )->insert( $parser->data );
	}
}
