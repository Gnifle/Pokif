<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveDamageClassProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_damage_class_prose' );
		
		DB::table( 'move_damage_class_prose' )->insert( $parser->data );
	}
}
