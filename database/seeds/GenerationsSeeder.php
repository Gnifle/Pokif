<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class GenerationsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'generations' );
		
		DB::table( 'generations' )->insert( $parser->data );
	}
}
