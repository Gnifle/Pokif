<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprite extends Model {
	
	/**
	 * Takes a spritable item or Pokemon identifier and returns a list of sprites for the spritable.
	 * Will JSON encode the list and return if $encode is true.
	 *
	 * @param string $spritable String with the identifier of the spritable.
	 * @param bool   $encode    Whether to return the sprite list JSON encoded or not. Defaults to false.
	 *
	 * @return array|string JSON encoded string of the sprite list if $encode is true. Otherwise returns the array of
	 *                      sprites.
	 */
	public static function path( $spritable, $encode = false ) {
		
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
}
