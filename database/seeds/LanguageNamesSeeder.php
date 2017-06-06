<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LanguageNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'language_names' );
		
		DB::table( 'language_names' )->insert( $parser->data );
	}
}
