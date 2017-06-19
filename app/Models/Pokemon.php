<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pokemon extends Model {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var string
	 */
	protected $table = 'pokemon';
	
	/**
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * Many-to-one inverse relationship with PokemonSpecies
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function species() {
		
		return $this->belongsTo( 'App\Models\PokemonSpecies' );
	}
	
	/**
	 * Many-to-many relationship with Ability
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function abilities() {
		
		return $this->hasMany( 'App\Models\Ability' );
	}
	
	/**
	 * Many-to-many relationship with EggGroup
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function egg_groups() {
		
		return $this->hasMany( 'App\Models\EggGroup' );
	}
	
	/**
	 * One-to-many relationship with PokemonForm
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function form() {
		
		return $this->hasOne( 'App\Models\PokemonForm' );
	}
	
	/**
	 * @return string The name of the Pokemon (species)
	 */
	public function name() {
		
		return $this->species->name();
	}
	
	/**
	 * Gets all Pokemon with the same species ID as the current Pokemon instance. Can, optionally, include the default
	 * form.
	 *
	 * @param bool $include_self (optional) Whether to include the default form. Defaults to false.
	 *
	 * @return array List of same species forms.
	 */
	public function sameSpecies( $include_self = false ) {
		
		$query = $this->where( 'species_id', $this->id );
		
		if( ! $include_self ) {
			
			$query = $query->where( 'is_default', false );
		}
		
		return $query->get()->toArray();
	}
	
	/**
	 * @return array List of forms for the Pokemon
	 */
	public function forms() {
		
		$same_species_ids = array_column( $this->sameSpecies( true ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )
		                  ->get();
	}
	
	/**
	 * @return array List of alternate (non-default) forms for the Pokemon
	 */
	public function alternateForms() {
		
		$same_species_ids = array_column( $this->sameSpecies( false ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )
		                  ->get();
	}
}
