<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass\tests\cases\extensions\helper;

use li3_phpass\extensions\helper\PhpAss;

class PhpAssTest extends \lithium\test\Unit {

	public function testHashAndCheckHash() {
		$phpAss = new PhpAss;
		$hash = $phpAss->hash( 'password' );

		$this->assertTrue( $phpAss->verify( 'password', $hash ) );

		$this->assertFalse( $phpAss->verify( 'wordpass', $hash ) );
	}
}