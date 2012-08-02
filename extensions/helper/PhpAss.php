<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

namespace li3_phpass\extensions\helper;

use \Phpass\Hash\Adapter\Sha512Crypt;

class PhpAss extends \lithium\template\Helper {

	/** @var $_instance \Phpass\Hash */
	protected $_instance;

	public function __construct() {
		$adapter = new Sha512Crypt(array (
			'iterationCountLog2' => 16
		));
		$this->_instance = new \Phpass\Hash($adapter);
	}

	public function getInstance() {
		return $this->_instance;
	}

	public function hashPassword( $password ) {
		return $this->_instance->hashPassword( $password );
	}

	public function checkPassword( $password, $passwordHash ) {
		return $this->_instance->checkPassword( $password, $passwordHash );
	}

	public function getAdapter( ) {
		return $this->_instance->getAdapter( );
	}

}
