<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class BerryFirmnessNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'berry_firmness_names' );
		
		DB::table( 'berry_firmness_names' )->insert( $parser->data );
	}
}
