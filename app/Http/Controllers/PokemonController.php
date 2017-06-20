<?php

/** @var App\Models\Pokemon $pokemon */

namespace App\Http\Controllers;

use App\Factories\PokemonFactory;
use App\Models\Pokedex;
use App\Models\Pokemon;
use App\Models\PokemonBackup2;
use App\Models\PokemonSpecies;
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
	 * @param int        $generation     The Pokedex to fetch Pokemon data from
	 * @param int|string $pokemon_handle Identifier (slug/number) for the Pokemon to show
	 *
	 * @return View|RedirectResponse View for the Pokemon if identifier matches a slug, otherwise redirects to
	 *                               the same route with number identifier swapped with slug, if given.
	 */
	public function show( $generation, $pokemon_handle ) {
		
		Config::set( 'generation', $generation );
		
		if( $this->resolvePokemonHandleIsSlug( $pokemon_handle ) ) {
			
			$pokemon = $this->pokemonBySpeciesIdentifier( $pokemon_handle );
			
		} else {
			
			return $this->resolveRedirectByPokemonId( $pokemon_handle, $generation );
		}
		
		print_r( $pokemon->name );

//		return view(
//			'pages.tools.importer.pokemon',
//			[ 'pokemon' => $pokemon, 'pokedex' => $pokedex ]
//		);
	}
	
	/**
	 * Checks the given PokemonBackup2 identifier to resolve whether to find the PokemonBackup2 by number or slug
	 *
	 * @param $pokemon_handle
	 *
	 * @return bool
	 */
	public static function resolvePokemonHandleIsSlug( $pokemon_handle ) {
		
		return intval( $pokemon_handle ) == 0;
	}
	
	/**
	 * @param $pokemon_handle
	 *
	 * @return Pokemon
	 */
	public static function pokemonBySpeciesIdentifier( $pokemon_handle ) {
		
		$pokemon_species_id = PokemonSpecies::where( 'identifier', $pokemon_handle )->value( 'id' );
		
		return Pokemon::find( $pokemon_species_id );
	}
	
	/**
	 * @param int $pokemon_id The Pokemon to find identifier by
	 * @param int $generation The generation from which to redirect the Pokemon
	 *
	 * @return RedirectResponse|View Redirect if an identifier was succesfully found by $pokemon_id. Else returns a 404
	 *                               Pokemon view
	 */
	public static function resolveRedirectByPokemonId( $pokemon_id, $generation ) {
		
		$pokemon_species = PokemonSpecies::find( $pokemon_id );
		
		if( $pokemon_species !== NULL ) {
			
			return Redirect::to( "/pokedex/{$generation}/{$pokemon_species->identifier}" );
			
		}
		
		return view( 'errors.503' );
	}
	
}