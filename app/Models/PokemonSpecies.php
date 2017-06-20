<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use DB;

/**
 * App\Models\PokemonSpecies
 *
 * @property int            $id
 * @property string         $identifier
 * @property int            $generation_id
 * @property int            $evolves_from_species_id
 * @property int            $evolution_chain_id
 * @property int            $color_id
 * @property int            $shape_id
 * @property int            $habitat_id
 * @property bool           $gender_rate
 * @property int            $capture_rate
 * @property int            $base_happiness
 * @property bool           $is_baby
 * @property int            $hatch_counter
 * @property bool           $has_gender_differences
 * @property int            $growth_rate_id
 * @property bool           $forms_switchable
 * @property int            $order
 * @property int            $conquest_order
 * @property-read Pokemon[] $pokemon
 * @method static PokemonSpecies whereId( $value )
 * @method static PokemonSpecies whereIdentifier( $value )
 * @method static PokemonSpecies whereGenerationId( $value )
 * @method static PokemonSpecies whereEvolvesFromSpeciesId( $value )
 * @method static PokemonSpecies whereEvolutionChainId( $value )
 * @method static PokemonSpecies whereColorId( $value )
 * @method static PokemonSpecies whereShapeId( $value )
 * @method static PokemonSpecies whereHabitatId( $value )
 * @method static PokemonSpecies whereGenderRate( $value )
 * @method static PokemonSpecies whereCaptureRate( $value )
 * @method static PokemonSpecies whereBaseHappiness( $value )
 * @method static PokemonSpecies whereIsBaby( $value )
 * @method static PokemonSpecies whereHatchCounter( $value )
 * @method static PokemonSpecies whereHasGenderDifferences( $value )
 * @method static PokemonSpecies whereGrowthRateId( $value )
 * @method static PokemonSpecies whereFormsSwitchable( $value )
 * @method static PokemonSpecies whereOrder( $value )
 * @method static PokemonSpecies whereConquestOrder( $value )
 */
class PokemonSpecies extends Eloquent {
	
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
	 * @return string The Pokemon species name
	 */
	public function getNameAttribute() {
		
		return DB::table( 'pokemon_species_names' )
		         ->where( 'pokemon_species_id', $this->id )
		         ->where( 'local_language_id', Language::active() )
		         ->value( 'name' );
	}
}
