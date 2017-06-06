<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LanguagesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'languages' );
		
		$language_list = $parser->data;
		
		DB::table( 'languages' )->insert( $language_list );
	}
}
