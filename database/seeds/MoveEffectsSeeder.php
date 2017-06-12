<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveEffectsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_effects' );
		
		DB::table( 'move_effects' )->insert( $parser->data );
	}
}
