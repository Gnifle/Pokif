<?php

namespace App\Models;

use Eloquent;

class Pokedex extends Eloquent {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $guarded = [];
}
