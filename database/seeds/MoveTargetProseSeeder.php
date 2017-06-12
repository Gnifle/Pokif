<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveTargetProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_target_prose' );
		
		DB::table( 'move_target_prose' )->insert( $parser->data );
	}
}
