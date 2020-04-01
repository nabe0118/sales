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
 *  Database settings for development environment
 * -----------------------------------------------------------------------------
 *
 *  These settings get merged with the global settings.
 *
 */

// return array(
// 	'default' => array(
// 		'type' => 'mysqli',
// 		'connection' => array(
// 			// 'dsn'      => 'mysql:host=mysql;dbname=sampledb;unix_socket=/var/run/mysqld/mysqld.sock',
// 			'dsn'      => 'mysql:host=mysql;dbname=sampledb;unix_socket=/var/run/mysqld/mysqld.sock',
// 			// 'hostname' => '172.20.0.2',
// 			'database' => 'sampledb',
// 			'socket'   => '/var/run/mysqld/mysqld.sock',
// 			'port'     => '3306',
// 			'username' => 'root',
// 			'password' => 'mypassword',
// 		),
// 	),
// );

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

// macbook 172.20.0.
// imac    172.18.0.2
//3306