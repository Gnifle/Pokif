<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaCategoryProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta_category_prose' );
		
		DB::table( 'move_meta_category_prose' )->insert( $parser->data );
	}
}
