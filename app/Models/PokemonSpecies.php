<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PokemonSpecies extends Model {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var string
	 */
	protected $table = 'pokemon_species';
	
	/**
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * One-to-many relationship with Pokemon
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pokemon() {
		
		return $this->hasMany( 'App\Models\Pokemon' );
	}
	
	/**
	 * Get the Pokemon species name
	 *
	 * @return mixed|string
	 */
	public function name() {
		
		return DB::table( 'pokemon_species_names' )
		         ->where( 'pokemon_species_id', $this->id )
		         ->where( 'local_language_id', Language::active() )
		         ->value( 'name' );
	}
}
