<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_names' );
		
		DB::table( 'move_names' )->insert( $parser->data );
	}
}
