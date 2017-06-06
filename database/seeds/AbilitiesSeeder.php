<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilitiesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'abilities' );
		
		DB::table( 'abilities' )->insert( $parser->data );
	}
}
