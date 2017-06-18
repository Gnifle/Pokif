<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App;

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
