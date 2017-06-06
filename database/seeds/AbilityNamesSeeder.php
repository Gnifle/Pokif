<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilityNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'ability_names' );
		
		DB::table( 'ability_names' )->insert( $parser->data );
	}
}
