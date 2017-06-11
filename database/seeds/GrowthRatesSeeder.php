<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class GrowthRatesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'growth_rates' );
		
		DB::table( 'growth_rates' )->insert( $parser->data );
	}
}
