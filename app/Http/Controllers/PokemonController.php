<?php

namespace App\Http\Controllers;

use App\Factories\PokemonFactory;

class PokemonController extends Controller {
	
	public function show( $pokemon_number ) {
		
		$pokemonFactory = PokemonFactory::getInstance();
		$pokemon        = $pokemonFactory->getPokemon( $pokemon_number );
		
		return view(
			'pages.tools.importer.pokemon',
			[ 'pokemon' => $pokemon->getName() ]
		);
	}
	
}