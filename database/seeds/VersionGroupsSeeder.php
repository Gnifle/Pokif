<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class VersionGroupsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'version_groups' );
		
		DB::table( 'version_groups' )->insert( $parser->data );
	}
}
