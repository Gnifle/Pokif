<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilityFlavorTextSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'ability_flavor_text' );
		
		DB::table( 'ability_flavor_text' )->insert( $parser->data );
	}
}
