<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class RegionNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'region_names' );
		
		
		DB::table( 'region_names' )->insert( $parser->data );
	}
}
