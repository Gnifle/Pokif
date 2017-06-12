<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveEffectProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_effect_prose' );
		
		DB::table( 'move_effect_prose' )->insert( $parser->data );
	}
}
