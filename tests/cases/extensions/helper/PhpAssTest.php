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

	public function testDefaultInstanceUsesSha512Adapter() {
		$hash = new PhpAss;
		// Verify Hash instance
		$this->assertTrue( $hash->getInstance() instanceof \Phpass\Hash );

		// Verify adapter instance
		$this->assertTrue( $hash->getAdapter() instanceof \Phpass\Hash\Adapter\Sha512Crypt );

		$property = new \ReflectionProperty('Phpass\\Hash\\Adapter\\Sha512Crypt', '_iterationCount');
		$property->setAccessible( TRUE );
		$this->assertEqual(
			65536, // Expected
			$property->getValue( $hash->getAdapter() ) // Actual
		);

		$property = new \ReflectionProperty('Phpass\\Hash\\Adapter\\Sha512Crypt', '_identifier');
		$property->setAccessible( TRUE );
		$this->assertEqual(
			6, // Expected
			$property->getValue( $hash->getAdapter() ) // Actual
		);


	}

	public function testHashAndCheckHash() {
		$phpAss = new PhpAss;
		$hash = $phpAss->hashPassword( 'testCase' );

		$this->assertTrue( $phpAss->checkPassword( 'testCase', $hash ) );
	}
}