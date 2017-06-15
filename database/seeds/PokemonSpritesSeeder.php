<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;
use App\Models\Sprite;

class PokemonSpritesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon' );
		
		$sprite_seed_list = [];
		
		foreach( $parser->data as $index => $pokemon ) {
			
			$sprite_seed = [
				'pokemon_id' => $pokemon[ 'id' ],
				'sprites' => Sprite::pokemonSpritePath( $pokemon[ 'id' ], true ),
			];
			
			$sprite_seed_list[] = $sprite_seed;
		}
		
		DB::table( 'pokemon_sprites' )->insert( $sprite_seed_list );
	}
}