<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveFlagProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_flag_prose' );
		
		DB::table( 'move_flag_prose' )->insert( $parser->data );
	}
}
