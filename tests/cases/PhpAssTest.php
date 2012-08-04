<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass\tests\cases;

use li3_phpass\PhpAss;
use \lithium\core\Libraries;

class PhpAssTest extends \lithium\test\Unit {

	public function testHashAndCheckHash() {
		$hash = PhpAss::hash('password');
		$this->assertTrue( PhpAss::verify( 'password', $hash ) );

		$this->assertFalse( PhpAss::verify( 'wordpass', $hash ) );
	}

}