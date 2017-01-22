<?php

use Illuminate\Database\Seeder;

class PokifAbilityTableSeeder extends Seeder {
	
	public function run() {
		
		$seed = file_get_contents( base_path() . '/resources/assets/json/ability_seed_66_blaze.json' );
		
		DB::table( 'ability' )->delete();
		
		$ability = array(
			array(
				'number'      => 1,
				'api_id'      => $seed->id,
				'name'        => $seed->names[ 0 ]->name,
				'slug'        => $seed->name,
				'generation'  => 3,
				'flavor_text' => $seed->effect_entries[ 0 ]->short_effect,
				'flavor_text' => $seed->effect_entries[ 0 ]->effect,
			),
		);
		
		DB::table( 'ability' )->insert( $ability );
		
	}
	
}