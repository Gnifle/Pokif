<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemCategoryProseSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_category_prose' );
		
		DB::table( 'item_category_prose' )->insert( $parser->data );
	}
}
