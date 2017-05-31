<?php

use Illuminate\Database\Seeder;

class PokedexTableSeeder extends Seeder {
	
	public function run() {
		
		$pokedex = [
			[
				'key'  => 0,
				'slug' => 'national-dex',
				'name' => 'National Dex',
			],
			[
				'key'  => 11,
				'slug' => 'kanto-dex',
				'name' => 'Kanto Dex',
			],
			[
				'key'  => 21,
				'slug' => 'johto-dex',
				'name' => 'Johto Dex',
			],
			[
				'key'  => 22,
				'slug' => 'johto-enhanced-dex',
				'name' => 'Johto Enhanced Dex',
			],
			[
				'key'  => 31,
				'slug' => 'hoenn-dex',
				'name' => 'Hoenn Dex',
			],
			[
				'key'  => 32,
				'slug' => 'hoenn-enhanced-dex',
				'name' => 'Hoenn Enhanced Dex',
			],
			[
				'key'  => 41,
				'slug' => 'sinnoh-dex',
				'name' => 'Sinnoh Dex',
			],
			[
				'key'  => 42,
				'slug' => 'sinnoh-platinum-dex',
				'name' => 'Sinnoh Platinum Dex',
			],
			[
				'key'  => 51,
				'slug' => 'unova-dex',
				'name' => 'Unova Dex',
			],
			[
				'key'  => 52,
				'slug' => 'unova-b2w2-dex',
				'name' => 'Unova B2W2 Dex',
			],
			[
				'key'  => 61,
				'slug' => 'kalos-dex',
				'name' => 'Kalos Dex',
			],
			[
				'key'  => 62,
				'slug' => 'kalos-central-dex',
				'name' => 'Kalos Central Dex',
			],
			[
				'key'  => 63,
				'slug' => 'kalos-coastal-dex',
				'name' => 'Kalos Coastal Dex',
			],
			[
				'key'  => 64,
				'slug' => 'kalos-mountain-dex',
				'name' => 'Kalos Mountain Dex',
			],
			[
				'key'  => 71,
				'slug' => 'alola-dex',
				'name' => 'Alola Dex',
			],
			[
				'key'  => 72,
				'slug' => 'alola-melemele-dex',
				'name' => 'Alola Melemele Dex',
			],
			[
				'key'  => 73,
				'slug' => 'alola-akala-dex',
				'name' => 'Alola Akala Dex',
			],
			[
				'key'  => 74,
				'slug' => 'alola-ulaula-dex',
				'name' => 'Alola Ula\'ula Dex',
			],
			[
				'key'  => 75,
				'slug' => 'alola-poni-dex',
				'name' => 'Alola Poni Dex',
			],
			[
				'key'  => -11,
				'slug' => 'fiore-ranger-dex',
				'name' => 'Fiore Ranger Dex',
			],
			[
				'key'  => -12,
				'slug' => 'almia-ranger-dex',
				'name' => 'Almia Ranger Dex',
			],
			[
				'key'  => -13,
				'slug' => 'oblivia-ranger-dex',
				'name' => 'Oblivia Ranger Dex',
			],
			[
				'key'  => -14,
				'slug' => 'past-oblivia-ranger-dex',
				'name' => 'Past Oblivia Ranger Dex',
			],
		];
		
		DB::table( 'pokedex' )->insert( $pokedex );
	}
}
