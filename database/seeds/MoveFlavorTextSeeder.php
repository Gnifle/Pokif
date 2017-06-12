<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveFlavorTextSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_flavor_text' );
		
		DB::table( 'move_flavor_text' )->insert( $parser->data );
	}
}
