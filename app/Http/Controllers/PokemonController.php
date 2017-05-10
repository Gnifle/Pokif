<?php

namespace App\Http\Controllers;

use App\Factories\PokemonFactory;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Redirect;

/**
 * Class PokemonController
 * @package App\Http\Controllers
 */
class PokemonController extends Controller {
	
	/**
	 * @param int $pokemon_identifier
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show( $pokemon_identifier ) {
		
		if( $this->getPokemonBySlug( $pokemon_identifier ) ) {
			
			$pokemon = Pokemon::where( 'slug', $pokemon_identifier )->take( 1 )->get()->first();
			
		} else {
			
			$pokemon = Pokemon::find( $pokemon_identifier );
			
			if( $pokemon !== NULL && $pokemon_slug = $pokemon->getSlug() ) {

				return Redirect::to( '/pokemon/' . $pokemon_slug );
				
			}
			
		}
		
		if( $pokemon === NULL ) {
			
			return view( 'errors.503' );
			
		}
		
		return view(
			'pages.tools.importer.pokemon',
			[ 'pokemon' => $pokemon ]
		);
	}
	
	/**
	 * @param $request Request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function import( Request $request ) {
		
		return view(
			'pages.tools.importer.pokemon',
			[ 'pokemon' => PokemonFactory::getInstance()->getPokemon( $request->get( 'pokemon_number' ) ) ]
		);
		
	}
	
	/**
	 * Checks the given Pokemon identifier to resolve whether to find the Pokemon by number or slug
	 *
	 * @param $pokemon_identifier
	 *
	 * @return bool
	 */
	public static function getPokemonBySlug( $pokemon_identifier ) {
		
		return intval( $pokemon_identifier ) == 0;
	}
	
}