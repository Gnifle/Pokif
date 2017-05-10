<?php
/**
 * Created by PhpStorm.
 * User: Daniel Gnifle
 * Date: 5/1/2017
 * Time: 19:24
 */

namespace App\Factories;

use App\Models\Pokemon;

class PokemonFactory {
	
	/**
	 * @var null|array $instance Singleton instance of the Pokemon factory
	 */
	protected static $instance = NULL;
	
	/**
	 * @var array|null $pokemons List of cached Pokemon objects for memory conservation
	 */
	protected $pokemons = NULL;
	
	/**
	 * @return PokemonFactory
	 */
	public static function getInstance() {
		
		if( ! self::$instance ) {
			static::$instance = new static;
		}
		
		return self::$instance;
	}
	
	/**
	 * PokemonFactory constructor.
	 */
	private function __construct() {
		
		$this->pokemons = [];
		
	}
	
	/**
	 * Gets a Pokemon by its number.
	 *
	 * @param $pokemon_number The number of which to fetch the Pokemon.
	 *
	 * @return Pokemon The Pokemon object for the given Pokemon number.
	 */
	public function getPokemon( $pokemon_number ) {
		
		if( isset( $this->pokemons[ $pokemon_number ] ) ) {
			return $this->pokemons[ $pokemon_number ];
		}
		
		return $this->pokemons[ $pokemon_number ] = new Pokemon( [ 'number', $pokemon_number ] );
	}
	
	/**
	 * Store a created Pokemon object for caching.
	 *
	 * @param Pokemon $pokemon The Pokemon object to store
	 *
	 * @return bool Whether storage was a success or not.
	 */
	public function storePokemon( $pokemon ) {
		
		if( ! $pokemon instanceof Pokemon || ! $pokemon->getNumber() ) {
			return false;
		}
		
		$this->pokemons[ $pokemon->get_number() ] = $pokemon;
		
		return true;
	}
	
}