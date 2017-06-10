<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class CharacteristicTextSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'characteristic_text' );
		
		DB::table( 'characteristic_text' )->insert( $parser->data );
	}
}
