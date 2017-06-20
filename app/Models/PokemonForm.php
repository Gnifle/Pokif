<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PokemonForm
 *
 * @property int $id
 * @property string $identifier
 * @property string $form_identifier
 * @property int $pokemon_id
 * @property int $introduced_in_version_group_id
 * @property bool $is_default
 * @property bool $is_battle_only
 * @property bool $is_mega
 * @property bool $form_order
 * @property int $order
 * @property-read \App\Models\Pokemon $pokemon
 * @method static PokemonForm whereId($value)
 * @method static PokemonForm whereIdentifier($value)
 * @method static PokemonForm whereFormIdentifier($value)
 * @method static PokemonForm wherePokemonId($value)
 * @method static PokemonForm whereIntroducedInVersionGroupId($value)
 * @method static PokemonForm whereIsDefault($value)
 * @method static PokemonForm whereIsBattleOnly($value)
 * @method static PokemonForm whereIsMega($value)
 * @method static PokemonForm whereFormOrder($value)
 * @method static PokemonForm whereOrder($value)
 */
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
