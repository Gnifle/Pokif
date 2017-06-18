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
	
	public function name() {
		
		return $this->species->name();
	}
	
	/**
	 * @return array List of forms for the Pokemon
	 */
	public function getForms() {
		
		return DB::table( 'pokemon' )
		         ->get( [ '*' ] )
		         ->where( 'species_id', $this->id )
		         ->toArray();
	}
	
	/**
	 * @return array List of forms for the Pokemon
	 */
	public function getAlternateForms() {
		
		return DB::table( 'pokemon' )
		         ->get( [ '*' ] )
		         ->where( 'species_id', $this->id )
		         ->where( 'is_default', false )
		         ->toArray();
	}
}
