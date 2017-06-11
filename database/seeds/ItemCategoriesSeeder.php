<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class ItemCategoriesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'item_categories' );
		
		DB::table( 'item_categories' )->insert( $parser->data );
	}
}
