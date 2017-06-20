<?php

namespace App\Models;

use Eloquent;

/**
 * App\Models\EggGroup
 *
 * @property int $id
 * @property string $identifier
 * @property int $generation_id
 * @property bool $is_main_series
 * @property-read Pokemon[] $pokemon
 * @method static EggGroup whereId($value)
 * @method static EggGroup whereIdentifier($value)
 * @method static EggGroup whereGenerationId($value)
 * @method static EggGroup whereIsMainSeries($value)
 */
class EggGroup extends Eloquent {
	
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
