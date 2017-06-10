<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class StatNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'stat_names' );
		
		DB::table( 'stat_names' )->insert( $parser->data );
	}
}
