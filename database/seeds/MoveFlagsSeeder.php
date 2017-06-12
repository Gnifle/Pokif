<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveFlagsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_flags' );
		
		DB::table( 'move_flags' )->insert( $parser->data );
	}
}
