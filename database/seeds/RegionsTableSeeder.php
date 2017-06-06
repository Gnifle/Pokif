<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class RegionsTableSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'regions' );
		
		DB::table( 'regions' )->insert( $parser->data );
		
	}
}
