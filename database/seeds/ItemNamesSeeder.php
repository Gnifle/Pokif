<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_names' );
		
		DB::table( 'item_names' )->insert( $parser->data );
	}
}
