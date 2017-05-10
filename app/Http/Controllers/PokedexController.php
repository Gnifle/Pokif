<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PokedexController extends Controller {
	
	/**
	 * @param int $pokedex_id The Pokedex identifier
	 *
	 * @return View
	 */
	public function index( $pokedex_id = NATIONAL_DEX ) {
		
		$pokedex_entries = $this->getPokemonByPokedex( $pokedex_id );
		
		return view(
			'pages.pokedex',
			[ 'pokemons' => $pokedex_entries ]
		);
	}
	
	private function getPokemonByPokedex( $pokedex_id ) {
		
		switch( $pokedex_id ) {
			
			case GENERATION_1:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_2:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_3:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_4:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_5:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_6:
				return Pokemon::all()->sortBy( 'number' );
			
			case GENERATION_7:
				return Pokemon::all()->sortBy( 'number' );
			
			case NATIONAL_DEX:
			default:
				return Pokemon::all()->sortBy( 'number' );
			
		}
	}
	
}
