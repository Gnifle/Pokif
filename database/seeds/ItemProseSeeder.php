<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_prose' );
		
		DB::table( 'item_prose' )->insert( $parser->data );
	}
}
