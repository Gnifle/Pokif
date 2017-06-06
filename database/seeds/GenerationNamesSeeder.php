<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class GenerationNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'generation_names' );
		
		DB::table( 'generation_names' )->insert( $parser->data );
	}
}
