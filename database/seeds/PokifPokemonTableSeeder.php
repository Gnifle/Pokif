<?php

use Illuminate\Database\Seeder;

class PokifPokemonTableSeeder extends Seeder {
	
	public function run() {
		
		$pokemon_list = pokif_csv_to_seed( 'pokemon' );
		
		DB::table( 'pokemon' )->insert( $pokemon_list );

//		OLD OBSOLETE METHOD, KEPT FOR LEARNING EXPERIENCE
//
//		$pokemon_seed         = file_get_contents( base_path() . '/resources/assets/json/pokemon_seed.json' );
//		$pokemon_species_seed = file_get_contents( base_path() . '/resources/assets/json/pokemon_species_seed.json' );
//		$seed                 = (object) array_merge( (array) json_decode( $pokemon_seed ), (array) json_decode( $pokemon_species_seed ) );
//
//		DB::table( 'pokemon' )->delete();
//
//		$pokemon = [
//			[
//				'number'                 => $seed->id,
//				'name'                   => $seed->names[ 0 ]->name,
//				'slug'                   => $seed->name,
//				'base_exp'               => $seed->base_experience,
//				'height'                 => $seed->height / 10,
//				'weight'                 => $seed->weight / 10,
//				'base_happiness'         => $seed->base_happiness,
//				'capture_rate'           => $seed->capture_rate,
//				'forms_switchable'       => $seed->forms_switchable,
//				'gender_rate'            => $seed->gender_rate,
//				'classification'         => $seed->genera[ 0 ]->genus,
//				'exp_growth_rate'        => $seed->growth_rate->name,
//				'has_gender_differences' => $seed->has_gender_differences,
//				'hatch_counter'          => $seed->hatch_counter,
//				'is_baby'                => $seed->is_baby,
//				'has_varieties'          => count( $seed->varieties > 1 ),
//				'created_at'             => new DateTime,
//				'updated_at'             => new DateTime,
//			],
//		];
//
//		$pokedex_entries = [
//			[
////				'id'             => 1,
//				'pokemon_number' => $seed->id,
//				'pokedex_key'    => 0,
//			],
//			[
////				'id'             => 2,
//				'pokemon_number' => $seed->id,
//				'pokedex_key'    => 21,
//			],
//			[
////				'id'             => 3,
//				'pokemon_number' => $seed->id,
//				'pokedex_key'    => 22,
//			],
//		];
//
//		DB::table( 'pokedex_entries' )->insert( $pokedex_entries );
	}
	
}