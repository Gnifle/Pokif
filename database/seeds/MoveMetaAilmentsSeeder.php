<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaAilmentsSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta_ailments' );
		
		DB::table( 'move_meta_ailments' )->insert( $parser->data );
	}
}
