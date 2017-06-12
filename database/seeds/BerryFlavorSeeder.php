<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class BerryFlavorSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'berry_flavors' );
		
		DB::table( 'berry_flavors' )->insert( $parser->data );
	}
}
