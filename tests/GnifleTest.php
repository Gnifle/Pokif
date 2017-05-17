<?php

//class GnifleTest extends PHPUnit_Framework_TestCase {
class GnifleTest extends TestCase {
	
	public function testLetsGo() {
		
		$this->visit( 'http://pokif.dev/pokedex/7/157' )
		     ->seePageIs( 'http://pokif.dev/pokedex/7/157' );
		
		$this->assertTrue( true );
		
	}
	
}
