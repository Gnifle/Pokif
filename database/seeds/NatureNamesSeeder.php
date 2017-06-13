<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class NatureNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'nature_names' );
		
		DB::table( 'nature_names' )->insert( $parser->data );
	}
}
