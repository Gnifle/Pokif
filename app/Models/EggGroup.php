<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EggGroup extends Model {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var string
	 */
	protected $table = 'abilities';
	
	/**
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * Many-to-many inverse relationship with Pokemon
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function pokemon() {
		
		return $this->belongsToMany( 'App\Model\Pokemon' );
	}
}
