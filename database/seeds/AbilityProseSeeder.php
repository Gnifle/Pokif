<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilityProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'ability_prose' );
		
		DB::table( 'ability_prose' )->insert( $parser->data );
	}
}
