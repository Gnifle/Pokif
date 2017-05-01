<?php
/**
 * Created by PhpStorm.
 * User: Daniel Gnifle
 * Date: 5/1/2017
 * Time: 21:09
 */

namespace App\Traits;

use Config;

trait Sluggable {
	
	/**
	 * @var string $slug The slug for the Sluggable
	 */
	protected $slug;
	
	/**
	 * @return string The slug for the Sluggable
	 */
	public function getSlug() {
		
		return $this->slug;
	}
	
	/**
	 * @param string $entry The slug to be set
	 */
	public function generateSlug( $entry ) {
		
		$this->slug = str_slug( $entry, Config::get( 'constants.URL_SEPARATOR' ) );
	}
	
}