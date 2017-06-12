<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaAilmentNamesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta_ailment_names' );
		
		DB::table( 'move_meta_ailment_names' )->insert( $parser->data );
	}
}
