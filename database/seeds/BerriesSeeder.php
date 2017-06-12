<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class BerriesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'berries' );
		
		DB::table( 'berries' )->insert( $parser->data );
	}
}
