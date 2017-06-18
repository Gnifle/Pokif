<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprite extends Model {
	
	/**
	 * Takes a spritable item or PokemonBackup2 identifier and returns a list of sprites for the spritable.
	 * Will JSON encode the list and return if $encode is true.
	 *
	 * @param string $spritable String with the identifier of the spritable.
	 * @param bool   $encode    Whether to return the sprite list JSON encoded or not. Defaults to false.
	 *
	 * @return array|string JSON encoded string of the sprite list if $encode is true. Otherwise returns the array of
	 *                      sprites.
	 */
	public static function itemSpritePath( $spritable, $encode = false ) {
		
		$sprite_list = [];
		
		switch( true ) {
			
			case preg_match( "/^data.card/", $spritable ):
				$sprite = 'data-card.png';
				break;
			
			case preg_match( "/^tm[0-9]/", $spritable ):
				// Figure out a way to parse the move type by TM name
				$sprite = 'tm-normal.png';
				break;
			
			case preg_match( "/^hm[0-9]/", $spritable ):
				// Figure out a way to parse the move type by HM name
				$sprite = 'hm-normal.png';
				break;
			
			default:
				$sprite = "{$spritable}.png";
				break;
		}
		
		$sprite_list[ 'default' ] = $sprite;
		
		if( $encode ) {
			
			return json_encode( $sprite_list );
		}
		
		return $sprite_list;
	}
	
	/**
	 * Takes a spritable item or PokemonBackup2 identifier and returns a list of sprites for the spritable.
	 * Will JSON encode the list and return if $encode is true.
	 *
	 * @param string $spritable String with the identifier of the spritable.
	 * @param bool   $encode    Whether to return the sprite list JSON encoded or not. Defaults to false.
	 *
	 * @return array|string JSON encoded string of the sprite list if $encode is true. Otherwise returns the array of
	 *                      sprites.
	 */
	public static function pokemonSpritePath( $spritable, $encode = false ) {
		
		$sprite_list = [
			'front_default'      => "{$spritable}.png",
			'front_female'       => "female/{$spritable}.png",
			'front_shiny'        => "shiny/{$spritable}.png",
			'front_shiny_female' => "shiny/female/{$spritable}.png",
			'back_default'       => "back/{$spritable}.png",
			'back_female'        => "back/female/{$spritable}.png",
			'back_shiny'         => "back/shiny/{$spritable}.png",
			'back_shiny_female'  => "back/shiny/female/{$spritable}.png",
		];
		
		if( $encode ) {
			
			return json_encode( $sprite_list );
		}
		
		return $sprite_list;
	}
	
	/**
	 * Takes a spritable item or PokemonBackup2 identifier and returns a list of sprites for the spritable.
	 * Will JSON encode the list and return if $encode is true.
	 *
	 * @param string $spritable String with the identifier of the spritable.
	 * @param bool   $encode    Whether to return the sprite list JSON encoded or not. Defaults to false.
	 *
	 * @return array|string JSON encoded string of the sprite list if $encode is true. Otherwise returns the array of
	 *                      sprites.
	 */
	public static function pokemonFormSpritePath( $spritable, $encode = false ) {
		
		$spritable_form_identifier = $spritable[ 'form_identifier' ];
		
		if( $spritable_form_identifier !== NULL ) {
			
			if( preg_match( "/^mega/", $spritable_form_identifier ) ) {
				
				$sprite_name = $spritable[ 'pokemon_id' ];
				
			} else {
				
				$species_id  = \DB::table( 'pokemon' )->where( 'id', $spritable[ 'pokemon_id' ] )->value( 'species_id' );
				$sprite_name = "{$species_id}-{$spritable_form_identifier}";
			}
			
		} else {
			
			$species_id  = \DB::table( 'pokemon' )->where( 'id', $spritable[ 'pokemon_id' ] )->value( 'species_id' );
			$sprite_name = $species_id;
		}
		
		$sprite_list = [
			'front_default' => "{$sprite_name}.png",
			'front_shiny'   => "shiny/{$sprite_name}.png",
			'back_default'  => "back/{$sprite_name}.png",
			'back_shiny'    => "back/shiny/{$sprite_name}.png",
		];
		
		if( $encode ) {
			
			return json_encode( $sprite_list );
		}
		
		return $sprite_list;
	}
}
