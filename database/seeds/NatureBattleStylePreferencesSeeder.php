<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class NatureBattleStylePreferencesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'nature_battle_style_preferences' );
		
		DB::table( 'nature_battle_style_preferences' )->insert( $parser->data );
	}
}
