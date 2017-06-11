<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class EggGroupsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'egg_groups' );
		
		DB::table( 'egg_groups' )->insert( $parser->data );
	}
}
