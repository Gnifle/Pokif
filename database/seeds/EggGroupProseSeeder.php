<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EggGroupProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'egg_group_prose' );
		
		DB::table( 'egg_group_prose' )->insert( $parser->data );
	}
}
