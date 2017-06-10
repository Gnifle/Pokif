<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class CharacteristicsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'characteristics' );
		
		DB::table( 'characteristics' )->insert( $parser->data );
	}
}
