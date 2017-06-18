<?php
/**
 * Created by PhpStorm.
 * User: Daniel Gnifle
 * Date: 5/1/2017
 * Time: 19:24
 */

namespace App\Factories;

use App\Models\PokemonBackup2;

class PokemonFactory {
	
	/**
	 * @var null|array $instance Singleton instance of the PokemonBackup2 factory
	 */
	protected static $instance = NULL;
	
	/**
	 * @var array|null $pokemons List of cached PokemonBackup2 objects for memory conservation
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
	 * Gets a PokemonBackup2 by its number.
	 *
	 * @param $pokemon_number The number of which to fetch the PokemonBackup2.
	 *
	 * @return PokemonBackup2 The PokemonBackup2 object for the given PokemonBackup2 number.
	 */
	public function getPokemon( $pokemon_number ) {
		
		if( isset( $this->pokemons[ $pokemon_number ] ) ) {
			return $this->pokemons[ $pokemon_number ];
		}
		
		return $this->pokemons[ $pokemon_number ] = new PokemonBackup2( [ 'number', $pokemon_number ] );
	}
	
	/**
	 * Store a created PokemonBackup2 object for caching.
	 *
	 * @param PokemonBackup2 $pokemon The PokemonBackup2 object to store
	 *
	 * @return bool Whether storage was a success or not.
	 */
	public function storePokemon( $pokemon ) {
		
		if( ! $pokemon instanceof PokemonBackup2 || ! $pokemon->getNumber() ) {
			return false;
		}
		
		$this->pokemons[ $pokemon->get_number() ] = $pokemon;
		
		return true;
	}
	
}