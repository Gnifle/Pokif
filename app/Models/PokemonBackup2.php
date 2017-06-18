<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class PokemonBackup2 extends Model {
	
	use Sluggable;
	
	/**
	 * @var string
	 */
	protected $table = 'pokemon';
	
	/**
	 * @var string
	 */
	protected $primaryKey = 'number';
	
	/**
	 * @var bool
	 */
	public $incrementing = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [ 'number' ];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function pokedex() {
		
		return $this->belongsToMany( 'App\Models\Pokedex', 'pokedex_entries', 'pokemon_number', 'pokedex_key' );
	}
	
	/**
	 * Returns the number of the PokemonBackup2 in the dex
	 *
	 * @return int The number of the PokemonBackup2 in the dex
	 */
	public function getNumber() {
		
		return $this->number;
	}
	
	/**
	 * Returns the raw name of the PokemonBackup2,
	 *
	 * @return string The name of the PokemonBackup2
	 */
	public function getName() {
		
		return $this->name;
	}
	
	/**
	 * Returns a machine-friendly slug based on the Pokemons name.
	 *
	 * @return string The slug of the PokemonBackup2
	 */
	public function getSlug() {
		
		if( ! $this->slug ) {
			$this->generateSlug( $this->name );
			$this->save();
		}
		
		return $this->slug;
	}
	
}
