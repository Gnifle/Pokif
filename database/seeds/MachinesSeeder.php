<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class MachinesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'machines' );
		
		DB::table( 'machines' )->insert( $parser->data );
	}
}
