<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilityChangelogSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'ability_changelog' );
		
		DB::table( 'ability_changelog' )->insert( $parser->data );
	}
}
