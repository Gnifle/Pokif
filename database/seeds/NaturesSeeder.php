<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class NaturesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'natures' );
		
		DB::table( 'natures' )->insert( $parser->data );
	}
}
