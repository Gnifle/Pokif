<?php
/**
 * Created by PhpStorm.
 * User: Daniel Gnifle
 * Date: 5/1/2017
 * Time: 21:09
 */

namespace App\Traits;

use Config;

trait Sluggable {
	
	/**
	 * @var string $slug The slug for the Sluggable
	 */
	protected $slug;
	
	/**
	 * Generates a machine-friendly slug based on the Pokemons name.
	 *
	 * @param string $name The name of the PokemonBackup2 whose slug to be set.
	 */
	public function generateSlug( $name ) {
		
		$this->slug = str_slug( $name, Config::get( 'constants.URL_SEPARATOR' ) );
	}
	
}