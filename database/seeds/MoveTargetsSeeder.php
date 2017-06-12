<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveTargetsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_targets' );
		
		DB::table( 'move_targets' )->insert( $parser->data );
	}
}
