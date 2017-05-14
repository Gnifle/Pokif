<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model {
	
	use Sluggable;
	
	protected $table = 'pokedex';
	
	protected $primaryKey = 'key';
	
	public $incrementing = false;
	
	public $timestamps = false;
	
	/**
	 * Returns a machine-friendly slug based on the Pokemons name.
	 *
	 * @return string The slug of the Pokemon
	 */
	public function getSlug() {
		
		if( ! $this->slug ) {
			$this->generateSlug( $this->name );
			$this->save();
		}
		
		return $this->slug;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function pokemon() {
		
		return $this->belongsToMany( 'App\Models\Pokemon', 'pokedex_entries', 'pokedex_key', 'pokemon_number' );
	}
	
	/**
	 * @param int $generation The generation
	 *
	 * @return Pokedex
	 */
	public static function byGeneration( $generation = NATIONAL_DEX ) {
		
		switch( $generation ) {
			
			case GENERATION_1:
				return Pokedex::find( KANTO_DEX );
			
			case GENERATION_2:
				return Pokedex::find( JOHTO_GEN4_DEX );
			
			case GENERATION_3:
				return Pokedex::find( HOENN_GEN7_DEX );
			
			case GENERATION_4:
				return Pokedex::find( SINNOH_PLATINUM_DEX );
			
			case GENERATION_5:
				return Pokedex::find( UNOVA_B2W2_DEX );
			
			case GENERATION_6:
				return Pokedex::find( KALOS_DEX );
			
			case GENERATION_7:
				return Pokedex::find( ALOLA_DEX );
			
			case NATIONAL_DEX:
				return Pokedex::find( NATIONAL_DEX );
				
			default:
				return false;
			
		}
		
	}
	
}
