<?php
/**
 * PhpAss Li3 Plugin
 *
 * @copyright     Copyright 2012, Jens Weck
 * @license       http://www.opensource.org/licenses/MIT The MIT License
 */

/**
 * Include PHPass class file
 */
if (!class_exists('Phpass\\Loader', false)) {
    require_once dirname(__DIR__) . '/vendors/Phpass.php';
}