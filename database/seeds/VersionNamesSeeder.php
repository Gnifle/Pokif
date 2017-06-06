<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class VersionNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'version_names' );
		
		DB::table( 'version_names' )->insert( $parser->data );
	}
}
