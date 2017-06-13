<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ExperienceSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'experience' );
		
		DB::table( 'experience' )->insert( $parser->data );
	}
}
