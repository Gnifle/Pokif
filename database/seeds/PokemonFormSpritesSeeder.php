<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;
use App\Models\Sprite;

class PokemonFormSpritesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'pokemon_forms', true, [ 'form_identifier' ] );
		
		$sprite_seed_list = [];
		
		foreach( $parser->data as $index => $pokemon_form ) {
			
			$sprite_seed = [
				'pokemon_form_id' => $pokemon_form[ 'id' ],
				'sprites'         => Sprite::pokemonFormSpritePath( $pokemon_form, true ),
			];
			
			$sprite_seed_list[] = $sprite_seed;
		}
		
		DB::table( 'pokemon_form_sprites' )->insert( $sprite_seed_list );
	}
}