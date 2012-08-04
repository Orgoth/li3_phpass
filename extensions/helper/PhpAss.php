<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass\extensions\helper;

use lithium\core\Libraries;

class PhpAss extends \lithium\template\Helper {

	protected $_adapter = 'PHPassLib\\Hash\\Bcrypt';

	public function __construct() {
		$_cfg = Libraries::get('li3_phpass');

		if( !empty( $_cfg[ 'adapter' ] ) ) {
			$this->_adapter = 'PHPassLib\\Hash\\' . $_cfg[ 'adapter' ];
		}

		$adapter = $this->_adapter;
		if( !empty( $_cfg[ 'config' ] ) ) {
			$adapter::genConfig($_cfg[ 'config' ]);
		} else {
			$adapter::genConfig( );
		}
	}

	public function hash( $password ) {
		$cls = $this->_adapter;
		return $cls::hash($password);
	}

	public function verify( $password, $passwordHash ) {
		$cls = $this->_adapter;
		return $cls::verify($password,$passwordHash);
	}

}
