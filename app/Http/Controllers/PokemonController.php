<?php

namespace App\Http\Controllers;

use App\Factories\PokemonFactory;
use App\Models\Pokedex;
use App\Models\Pokemon;
use App\Models\PokemonBackup2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;
use Config;

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
	/*public function show( $pokemon_identifier ) {
		
		if( $this->getPokemonBySlug( $pokemon_identifier ) ) {
			
			$pokemon = PokemonBackup2::where( 'slug', $pokemon_identifier )->take( 1 )->get()->first();
			
		} else {
			
			$pokemon = PokemonBackup2::find( $pokemon_identifier );
			
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
	}*/
	
	/**
	 * @param int        $generation         The Pokedex to fetch PokemonBackup2 data from
	 * @param int|string $pokemon_identifier Identifier (slug/number) for the PokemonBackup2 to show
	 *
	 * @return View|RedirectResponse View for the PokemonBackup2 if identifier matches a slug, otherwise redirects to
	 *                               the same route with number identifier swapped with slug, if given.
	 */
	public function show( $generation, $pokemon_identifier ) {
		
		Config::set( 'generation', $generation );
		
		$pokemon = Pokemon::find( $pokemon_identifier );
		print_r( $pokemon->getAlternateForms() );

//		$pokedex = Pokedex::byGeneration( $dex );
//
//		if( $this->resolvePokemonIdentifierIsSlug( $pokemon_identifier ) ) {
//
//			$pokemon = PokemonBackup2::where( 'slug', $pokemon_identifier )->take( 1 )->get()->first();
//
//		} else {
//
//			$pokemon = PokemonBackup2::find( $pokemon_identifier );
//
//			if( $pokemon !== NULL && $pokemon_slug = $pokemon->getSlug() ) {
//
//				return Redirect::to( "/pokedex/{$dex}/{$pokemon_slug}" );
//
//			}
//
//		}
//
//		if( $pokemon === NULL ) {
//
//			return view( 'errors.503' );
//
//		}
//
//		return view(
//			'pages.tools.importer.pokemon',
//			[ 'pokemon' => $pokemon, 'pokedex' => $pokedex ]
//		);
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
	 * Checks the given PokemonBackup2 identifier to resolve whether to find the PokemonBackup2 by number or slug
	 *
	 * @param $pokemon_identifier
	 *
	 * @return bool
	 */
	public static function resolvePokemonIdentifierIsSlug( $pokemon_identifier ) {
		
		return intval( $pokemon_identifier ) == 0;
	}
	
}