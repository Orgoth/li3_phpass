<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass;

use \Phpass\Hash\Adapter\Sha512Crypt;

class PhpAss {

	/** @var $_instance \Phpass\Hash */
	protected static $_instance = false;

	public static function init() {
		if( !self::$_instance  ) {
			$adapter = new Sha512Crypt(array (
				'iterationCountLog2' => 16
			));
			self::$_instance = new \Phpass\Hash($adapter);
		}
	}

	public static function getInstance() {
		self::init();
		return self::$_instance;
	}

	public static function hashPassword( $password ) {
		self::init();
		return self::$_instance->hashPassword( $password );
	}

	public static function checkPassword( $password, $passwordHash ) {
		self::init();
		return self::$_instance->checkPassword( $password, $passwordHash );
	}

}