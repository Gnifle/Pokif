<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class TypeEfficacySeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'type_efficacy' );
		
		DB::table( 'type_efficacy' )->insert( $parser->data );
	}
}
