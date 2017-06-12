<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemFlagMapSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_flag_map' );
		
		DB::table( 'item_flag_map' )->insert( $parser->data );
	}
}
