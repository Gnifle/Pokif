<?php

namespace App\Models;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string $identifier
 * @property int $generation_id
 * @property bool $is_main_series
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pokemon[] $pokemon
 * @method static Ability whereId($value)
 * @method static Ability whereIdentifier($value)
 * @method static Ability whereGenerationId($value)
 * @method static Ability whereIsMainSeries($value)
 */
class Ability extends Eloquent {
	
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
		
		return $this->belongsToMany( Pokemon::class );
	}
}
