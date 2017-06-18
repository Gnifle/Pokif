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
	public function getSameSpecies( $include_self = false ) {
		
		$query = $this->where( 'species_id', $this->id );
		
		if( ! $include_self ) {
			
			$query = $query->where( 'is_default', false );
		}
		
		return $query->get()->toArray();
	}
	
	/**
	 * @return array List of forms for the Pokemon
	 */
	public function getForms() {
		
		$same_species_ids = array_column( $this->getSameSpecies( true ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )
		                  ->get();
	}
	
	/**
	 * @return array List of alternate (non-default) forms for the Pokemon
	 */
	public function getAlternateForms() {
		
		$same_species_ids = array_column( $this->getSameSpecies( false ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )
		                  ->get();
	}
}
