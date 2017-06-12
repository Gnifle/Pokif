<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class TypeNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'type_names' );
		
		DB::table( 'type_names' )->insert( $parser->data );
	}
}
