<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $iso639
 * @property string $iso3166
 * @property string $identifier
 * @property bool $official
 * @property int $order
 * @method static Language whereId($value)
 * @method static Language whereIso639($value)
 * @method static Language whereIso3166($value)
 * @method static Language whereIdentifier($value)
 * @method static Language whereOfficial($value)
 * @method static Language whereOrder($value)
 */
class Language extends Model {
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [];
	
	/**
	 * @return int The ID for the current locale identifier
	 */
	public static function active() {
		
		return DB::table( 'languages' )->where( 'identifier', App::getLocale() )->value( 'id' );
	}
	
	/**
	 * @param string $locale (optional) The locale identifier to fetch an ID for
	 *
	 * @return int The ID for the given locale identifier
	 */
	public static function byLocale( $locale ) {
		
		return DB::table( 'languages' )->where( 'identifier', $locale )->value( 'id' );
	}
}
