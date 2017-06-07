<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class AbilityChangelogProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'ability_changelog_prose' );
		
		DB::table( 'ability_changelog_prose' )->insert( $parser->data );
	}
}
