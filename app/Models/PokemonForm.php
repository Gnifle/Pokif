<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonForm extends Model {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var string
	 */
	protected $table = 'pokemon_forms';
	
	/**
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * Many-to-one relationship with Pokemon
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pokemon() {
		
		return $this->belongsTo( 'App\Models\Pokemon' );
	}
}
