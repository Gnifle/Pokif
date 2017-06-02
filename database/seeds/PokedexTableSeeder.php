<?php

use Illuminate\Database\Seeder;

class PokedexTableSeeder extends Seeder {
	
	public function run() {
		
		$pokedex_list = pokif_csv_to_seed( 'pokedexes' );
		
		DB::table( 'pokedexes' )->insert( $pokedex_list );

//		$pokedexes_csv_file = fopen( base_path() . '/resources/assets/csv/pokedexes.csv', 'r' );
//
//		if( $pokedexes_csv_file !== false ) {
//
//			$keys = fgetcsv( $pokedexes_csv_file, 0, ',', chr( 8 ) );
//
//			while( ( $pokedex = fgetcsv( $pokedexes_csv_file, 75, ',', chr( 8 ) ) ) !== false ) {
//				$pokedex = (object) array_combine( $keys, $pokedex );
//
//				$pokedex_list[] = [
//					'id' => $pokedex->id,
//					'region_id' => $pokedex->region_id,
//					'identifier' => $pokedex->identifier,
//					'is_main_series' => $pokedex->is_main_series,
//				];
//			}
//		}
//
//		OLD OBSOLETE METHOD
//
//		$pokedex = [
//			[
//				'key'  => 0,
//				'slug' => 'national-dex',
//				'name' => 'National Dex',
//			],
//			[
//				'key'  => 11,
//				'slug' => 'kanto-dex',
//				'name' => 'Kanto Dex',
//			],
//			[
//				'key'  => 21,
//				'slug' => 'johto-dex',
//				'name' => 'Johto Dex',
//			],
//			[
//				'key'  => 22,
//				'slug' => 'johto-enhanced-dex',
//				'name' => 'Johto Enhanced Dex',
//			],
//			[
//				'key'  => 31,
//				'slug' => 'hoenn-dex',
//				'name' => 'Hoenn Dex',
//			],
//			[
//				'key'  => 32,
//				'slug' => 'hoenn-enhanced-dex',
//				'name' => 'Hoenn Enhanced Dex',
//			],
//			[
//				'key'  => 41,
//				'slug' => 'sinnoh-dex',
//				'name' => 'Sinnoh Dex',
//			],
//			[
//				'key'  => 42,
//				'slug' => 'sinnoh-platinum-dex',
//				'name' => 'Sinnoh Platinum Dex',
//			],
//			[
//				'key'  => 51,
//				'slug' => 'unova-dex',
//				'name' => 'Unova Dex',
//			],
//			[
//				'key'  => 52,
//				'slug' => 'unova-b2w2-dex',
//				'name' => 'Unova B2W2 Dex',
//			],
//			[
//				'key'  => 61,
//				'slug' => 'kalos-dex',
//				'name' => 'Kalos Dex',
//			],
//			[
//				'key'  => 62,
//				'slug' => 'kalos-central-dex',
//				'name' => 'Kalos Central Dex',
//			],
//			[
//				'key'  => 63,
//				'slug' => 'kalos-coastal-dex',
//				'name' => 'Kalos Coastal Dex',
//			],
//			[
//				'key'  => 64,
//				'slug' => 'kalos-mountain-dex',
//				'name' => 'Kalos Mountain Dex',
//			],
//			[
//				'key'  => 71,
//				'slug' => 'alola-dex',
//				'name' => 'Alola Dex',
//			],
//			[
//				'key'  => 72,
//				'slug' => 'alola-melemele-dex',
//				'name' => 'Alola Melemele Dex',
//			],
//			[
//				'key'  => 73,
//				'slug' => 'alola-akala-dex',
//				'name' => 'Alola Akala Dex',
//			],
//			[
//				'key'  => 74,
//				'slug' => 'alola-ulaula-dex',
//				'name' => 'Alola Ula\'ula Dex',
//			],
//			[
//				'key'  => 75,
//				'slug' => 'alola-poni-dex',
//				'name' => 'Alola Poni Dex',
//			],
//			[
//				'key'  => - 11,
//				'slug' => 'fiore-ranger-dex',
//				'name' => 'Fiore Ranger Dex',
//			],
//			[
//				'key'  => - 12,
//				'slug' => 'almia-ranger-dex',
//				'name' => 'Almia Ranger Dex',
//			],
//			[
//				'key'  => - 13,
//				'slug' => 'oblivia-ranger-dex',
//				'name' => 'Oblivia Ranger Dex',
//			],
//			[
//				'key'  => - 14,
//				'slug' => 'past-oblivia-ranger-dex',
//				'name' => 'Past Oblivia Ranger Dex',
//			],
//		];
	}
}
