<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveDamageClassesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_damage_classes' );
		
		DB::table( 'move_damage_classes' )->insert( $parser->data );
	}
}
