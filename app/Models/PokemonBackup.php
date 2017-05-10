<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
use Eloquent;
use DB;

//class Pokemon extends Model {
class PokemonBackup extends Eloquent {
	
	use Sluggable;
	
	protected $table = 'pokemon';
	
	protected $primaryKey = 'number';
	
	public $incrementing = false;
	
	protected $number;
	
	protected $name;
	
//	/**
//	 * @return mixed
//	 */
//	public function getName() {
//
//		return $this->name;
//	}
//
//	public function __construct( $pokemon_number ) {
//
//		$pokemonData = $this->loadPokemonData( $pokemon_number );
//
//		$this->name = $pokemonData->name;
//	}
//
//	/**
//	 * Loads the Pokemon data from the database using Eloquent.
//	 *
//	 * @param $pokemon_number The unique number of the Pokemon to retrieve data from.
//	 *
//	 * @return Collection List og data for the requested Pokemon.
//	 */
//	private function loadPokemonData( $pokemon_number ) {
//
//		$pokemonData = DB::table( 'pokemon' )->where( 'number', '=', $pokemon_number )->take( 1 )->get();
////		$pokemon     = Pokemon::find( 157 );
//		$pokemon = Pokemon::find( $pokemon_number );
//		print_r( $pokemon );
//
//		return $pokemonData[ 0 ];
//
//	}
//
}