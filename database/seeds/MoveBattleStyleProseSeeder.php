<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveBattleStyleProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_battle_style_prose' );
		
		DB::table( 'move_battle_style_prose' )->insert( $parser->data );
	}
}
