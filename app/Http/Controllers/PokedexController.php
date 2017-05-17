<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\View\View;

class PokedexController extends Controller {
	
	/**
	 * @param int $generation The pokedex generation to display
	 *
	 * @return View The Pokedex view
	 */
	public function index( $generation = NATIONAL_DEX ) {
		
		$pokedex = Pokedex::byGeneration( $generation );
		
		if( $pokedex === false || $pokedex === NULL ) {
			return view( 'errors.pokedex.404' )->with( 'message', 'Pokedex not found' );
		}
		
		$pokedex_entries = $pokedex->pokemon;
		
		return view(
			'pages.pokedex',
			[ 'pokedex' => $pokedex, 'pokemons' => $pokedex_entries ]
		);
	}
	
	
	
}