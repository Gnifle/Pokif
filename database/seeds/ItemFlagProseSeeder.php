<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlagProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_flag_prose' );
		
		DB::table( 'item_flag_prose' )->insert( $parser->data );
	}
}
