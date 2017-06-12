<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta', true, [ 'min_hits', 'max_hits', 'min_turns', 'max_turns' ] );
		
		DB::table( 'move_meta' )->insert( $parser->data );
	}
}
