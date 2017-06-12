<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class TypeGameIndicesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'type_game_indices' );
		
		DB::table( 'type_game_indices' )->insert( $parser->data );
	}
}
