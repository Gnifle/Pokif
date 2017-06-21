<?php

namespace App\Http\Controllers;

use App\Models\Pokedex2;
use Illuminate\View\View;

class PokedexController extends Controller {
	
	/**
	 * @param int $generation The pokedex generation to display
	 *
	 * @return View The Pokedex2 view
	 */
	public function index( $generation = NATIONAL_DEX ) {
		
//		$pokedex = Pokedex2::byGeneration( $generation );
//
//		if( $pokedex === false || $pokedex === NULL ) {
//			return view( 'errors.pokedex.404' )->with( 'message', 'Pokedex2 not found' );
//		}
//
//		$pokedex_entries = $pokedex->pokemon;
		
		return view(
//			'pages.pokedex',
			'pages.tools.importer.pokemon',
			[]
//			[ 'pokedex' => $pokedex, 'pokemons' => $pokedex_entries ]
		);
	}
	
	
	
}