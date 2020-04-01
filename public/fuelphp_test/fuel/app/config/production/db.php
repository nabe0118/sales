<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Database settings for production environment
 * -----------------------------------------------------------------------------
 *
 *  These settings get merged with the global settings.
 *
 */

return array(
	'default' => array(
	'type' => 'pdo',
	'connection' => array(
	'dsn' => 'mysql:host=172.23.0.2;dbname=sampledb',
	'socket' => '/var/run/mysqld/mysqld.sock',
	'username' => 'root',
	'password' => 'mypassword',
	),
	),
   );
