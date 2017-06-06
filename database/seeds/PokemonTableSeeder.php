<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonTableSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon' );
		
		DB::table( 'pokemon' )->insert( $parser->data );
	}
	
}