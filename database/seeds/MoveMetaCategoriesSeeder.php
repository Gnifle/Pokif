<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaCategoriesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta_categories' );
		
		DB::table( 'move_meta_categories' )->insert( $parser->data );
	}
}
