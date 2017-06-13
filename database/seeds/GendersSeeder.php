<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class GendersSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'genders' );
		
		DB::table( 'genders' )->insert( $parser->data );
	}
}
