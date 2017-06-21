<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Pokedex2 extends Model {
	
	use Sluggable;
	
	protected $table = 'pokedex';
	
	protected $primaryKey = 'key';
	
	public $incrementing = false;
	
	public $timestamps = false;
	
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
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function pokemon() {
		
		return $this->belongsToMany( 'App\Models\PokemonBackup2', 'pokedex_entries', 'pokedex_key', 'pokemon_number' );
	}
	
	/**
	 * @param int $generation The generation
	 *
	 * @return Pokedex2
	 */
	public static function byGeneration( $generation = NATIONAL_DEX ) {
		
		switch( $generation ) {
			
			case GENERATION_1:
				return Pokedex2::find( KANTO_DEX );
			
			case GENERATION_2:
				return Pokedex2::find( JOHTO_GEN4_DEX );
			
			case GENERATION_3:
				return Pokedex2::find( HOENN_GEN7_DEX );
			
			case GENERATION_4:
				return Pokedex2::find( SINNOH_PLATINUM_DEX );
			
			case GENERATION_5:
				return Pokedex2::find( UNOVA_B2W2_DEX );
			
			case GENERATION_6:
				return Pokedex2::find( KALOS_DEX );
			
			case GENERATION_7:
				return Pokedex2::find( ALOLA_DEX );
			
			case NATIONAL_DEX:
				return Pokedex2::find( NATIONAL_DEX );
				
			default:
				return false;
			
		}
		
	}
	
}
