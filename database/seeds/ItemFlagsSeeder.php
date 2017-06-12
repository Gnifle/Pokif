<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlagsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_flags' );
		
		DB::table( 'item_flags' )->insert( $parser->data );
	}
}
