<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class BerryFirmnessSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'berry_firmness' );
		
		DB::table( 'berry_firmness' )->insert( $parser->data );
	}
}
