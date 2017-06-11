<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class GrowthRateProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'growth_rate_prose' );
		
		DB::table( 'growth_rate_prose' )->insert( $parser->data );
	}
}
