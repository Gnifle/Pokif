<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveFlagMapSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_flag_map' );
		
		DB::table( 'move_flag_map' )->insert( $parser->data );
	}
}
