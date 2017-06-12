<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class LanguagesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'languages' );
		
		DB::table( 'languages' )->insert( $parser->data );
	}
}
