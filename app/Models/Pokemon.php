<?php

namespace App\Models;

use App\Models\EggGroup;
use Eloquent;
use Illuminate\Support\Collection;

/**
 * App\Models\Pokemon
 *
 * @property int                 $id
 * @property string              $identifier
 * @property int                 $species_id
 * @property int                 $height
 * @property int                 $weight
 * @property int                 $base_experience
 * @property int                 $order
 * @property int                 $is_default
 * @property-read PokemonSpecies $species
 * @property-read Ability[]      $abilities
 * @property-read EggGroup[]     $egg_groups
 * @property-read PokemonForm    $form
 * @property-read string         $name
 * @method static Pokemon whereId( $value )
 * @method static Pokemon whereIdentifier( $value )
 * @method static Pokemon whereSpeciesId( $value )
 * @method static Pokemon whereHeight( $value )
 * @method static Pokemon whereWeight( $value )
 * @method static Pokemon whereBaseExperience( $value )
 * @method static Pokemon whereOrder( $value )
 * @method static Pokemon whereIsDefault( $value )
 */
class Pokemon extends Eloquent {
	
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
		
		return $this->belongsTo( PokemonSpecies::class );
	}
	
	/**
	 * Many-to-many relationship with Ability
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function abilities() {
		
		return $this->hasMany( Ability::class );
	}
	
	/**
	 * Many-to-many relationship with EggGroup
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function egg_groups() {
		
		return $this->hasMany( EggGroup::class );
	}
	
	/**
	 * One-to-many relationship with PokemonForm
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function form() {
		
		return $this->hasOne( PokemonForm::class );
	}
	
	/**
	 * @return string The name of the Pokemon (species)
	 */
	public function getNameAttribute() {
		
		return $this->species->name;
	}
	
	/**
	 * @return Collection List of forms for the Pokemon
	 */
	public function getFormsAttribute() {
		
		$same_species_ids = array_column( $this->sameSpecies( true ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )->get();
	}
	
	/**
	 * @return Collection List of alternate (non-default) forms for the Pokemon
	 */
	public function getAlternateFormsAttribute() {
		
		$same_species_ids = array_column( $this->sameSpecies( false ), 'id' );
		
		return PokemonForm::whereIn( 'pokemon_id', $same_species_ids )->get();
	}
	
	/**
	 * Gets all Pokemon with the same species ID as the current Pokemon instance. Can, optionally, include the default
	 * form.
	 *
	 * @param bool $include_self (optional) Whether to include the default form. Defaults to false.
	 *
	 * @return array List of same species forms.
	 */
	private function sameSpecies( $include_self = false ) {
		
		$query = $this->where( 'species_id', $this->id );
		
		if( ! $include_self ) {
			
			$query = $query->where( 'is_default', false );
		}
		
		return $query->get()->toArray();
	}
}
