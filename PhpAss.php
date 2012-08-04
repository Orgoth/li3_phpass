<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass;

use lithium\core\Libraries;

use PHPassLib\Hash\BCrypt;
use PHPassLib\Hash\BSDiCrypt;
use PHPassLib\Hash\DESCrypt;
use PHPassLib\Hash\MD5Crypt;
use PHPassLib\Hash\PBKDF2;
use PHPassLib\Hash\Portable;
use PHPassLib\Hash\SHA1Crypt;
use PHPassLib\Hash\SHA256Crypt;
use PHPassLib\Hash\SHA512Crypt;

class PhpAss extends \lithium\core\StaticObject {

	/** @var $_cfg array */
	protected static $_cfg;

	protected static $_adapter = 'PHPassLib\\Hash\\BCrypt';

	public static function __init() {
		self::$_cfg = Libraries::get( 'li3_phpass' );

		if ( !empty( self::$_cfg[ 'adapter' ] ) ) {
			self::$_adapter = 'PHPassLib\\Hash\\' . self::$_cfg[ 'adapter' ];
		}

		$adapter = self::$_adapter;
		if ( !empty( self::$_cfg[ 'config' ] ) ) {
			$adapter::genConfig( self::$_cfg[ 'config' ] );
		} else {
			$adapter::genConfig();
		}
	}

	public static function hash( $password ) {
		$adapter = self::$_adapter;
		return $adapter::hash( $password );
	}

	public static function verify( $password, $passwordHash ) {
		$adapter = self::$_adapter;
		return $adapter::verify( $password, $passwordHash );
	}
}