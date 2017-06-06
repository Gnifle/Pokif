<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class VersionGroupRegionsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'version_group_regions' );
		
		DB::table( 'version_group_regions' )->insert( $parser->data );
	}
}
