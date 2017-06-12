<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class TypesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'types', true, [ 'generation_id', 'damage_class_id' ] );
		
		DB::table( 'types' )->insert( $parser->data );
	}
}
