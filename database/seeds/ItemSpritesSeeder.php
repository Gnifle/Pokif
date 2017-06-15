<?php

use Illuminate\Database\Seeder;
use App\Helpers\PokifCSVParser;
use App\Models\Sprite;

class ItemSpritesSeeder extends Seeder {
	
	public function run() {
		
		$parser = new PokifCSVParser( 'items', true, [ 'fling_power', 'fling_effect_id' ] );
		
		$sprite_seed_list = [];
		
		foreach( $parser->data as $index => $item ) {
			
			$sprite_seed = [
				'item_id' => $item[ 'id' ],
				'sprites' => Sprite::itemSpritePath( $item[ 'identifier' ], true ),
			];
			
			$sprite_seed_list[] = $sprite_seed;
		}
		
		DB::table( 'item_sprites' )->insert( $sprite_seed_list );
	}
}