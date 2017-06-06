<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class VersionsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'versions' );
		
		DB::table( 'versions' )->insert( $parser->data );
	}
}
