<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MoveMetaStatChangesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'move_meta_stat_changes' );
		
		DB::table( 'move_meta_stat_changes' )->insert( $parser->data );
	}
}
