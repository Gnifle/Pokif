<?php

use Illuminate\Database\Seeder;

class PokifPokemonTableSeeder extends Seeder {
	
	public function run() {
		
		
		
		$pokemon_seed         = file_get_contents( base_path() . '/resources/assets/json/pokemon_seed.json' );
		$pokemon_species_seed = file_get_contents( base_path() . '/resources/assets/json/pokemon_species_seed.json' );
		$seed                 = (object) array_merge( (array) json_decode( $pokemon_seed ), (array) json_decode( $pokemon_species_seed ) );
		
		DB::table( 'pokemon' )->delete();
		
		$pokemon = [
			[
				'number'                 => $seed->id,
				'name'                   => $seed->names[ 0 ]->name,
				'slug'                   => $seed->name,
				'base_exp'               => $seed->base_experience,
				'height'                 => $seed->height / 10,
				'weight'                 => $seed->weight / 10,
				'base_happiness'         => $seed->base_happiness,
				'capture_rate'           => $seed->capture_rate,
				'forms_switchable'       => $seed->forms_switchable,
				'gender_rate'            => $seed->gender_rate,
				'classification'         => $seed->genera[ 0 ]->genus,
				'exp_growth_rate'        => $seed->growth_rate->name,
				'has_gender_differences' => $seed->has_gender_differences,
				'hatch_counter'          => $seed->hatch_counter,
				'is_baby'                => $seed->is_baby,
				'has_varieties'          => count( $seed->varieties > 1 ),
				'created_at'             => new DateTime,
				'updated_at'             => new DateTime,
			],
		];
		
		DB::table( 'pokemon' )->insert( $pokemon );
		
		$pokedex = [
			[
				'key' => 1,
				'slug' => 'kanto-dex',
				'name' => 'Kanto Dex',
			],
			[
				'key' => 2,
				'slug' => 'johto-dex',
				'name' => 'Johto Dex',
			],
			[
				'key' => 3,
				'slug' => 'hoenn-dex',
				'name' => 'Hoenn Dex',
			],
			[
				'key' => 4,
				'slug' => 'sinnoh-dex',
				'name' => 'Sinnoh Dex',
			],
			[
				'key' => 5,
				'slug' => 'unova-dex',
				'name' => 'Unova Dex',
			],
			[
				'key' => 6,
				'slug' => 'kalos-dex',
				'name' => 'Kalos Dex',
			],
			[
				'key' => 7,
				'slug' => 'alola-dex',
				'name' => 'Alola Dex',
			],
			[
				'key' => 11,
				'slug' => 'kanto-dex',
				'name' => 'Kanto Dex',
			],
			[
				'key' => 21,
				'slug' => 'johto-dex',
				'name' => 'Johto Dex',
			],
			[
				'key' => 22,
				'slug' => 'johto-enhanced-dex',
				'name' => 'Johto Enhanced Dex',
			],
			[
				'key' => 31,
				'slug' => 'hoenn-dex',
				'name' => 'Hoenn Dex',
			],
			[
				'key' => 32,
				'slug' => 'hoenn-enhanced-dex',
				'name' => 'Hoenn Enhanced Dex',
			],
		];
		
		DB::table( 'pokedex' )->insert( $pokedex );
		
	}
	
}