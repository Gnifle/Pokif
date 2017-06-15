<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;

class PokemonEvolutionSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_evolution', true, [
			'trigger_item_id',
			'minimum_level',
			'gender_id',
			'location_id',
			'held_item_id',
			'time_of_day',
			'known_move_id',
			'known_move_type_id',
			'minimum_happiness',
			'minimum_beauty',
			'minimum_affection',
			'relative_physical_stats',
			'party_species_id',
			'party_type_id',
			'trade_species_id',
		] );
		
		DB::table( 'pokemon_evolution' )->insert( $parser->data );
	}
}
