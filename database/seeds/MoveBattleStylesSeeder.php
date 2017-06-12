<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveBattleStylesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_battle_styles' );
		
		DB::table( 'move_battle_styles' )->insert( $parser->data );
	}
}
