<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Pokemon extends Model {
	
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
	 * Returns the number of the Pokemon in the dex
	 *
	 * @return int The number of the Pokemon in the dex
	 */
	public function getNumber() {
		
		return $this->number;
	}
	
	/**
	 * Returns the raw name of the Pokemon,
	 *
	 * @return string The name of the Pokemon
	 */
	public function getName() {
		
		return $this->name;
	}
	
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
	
}
