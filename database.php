<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

  $db['default'] = array( //Base de datos Local Miguel
  	'dsn'	=> '',
  	'hostname' => 'localhost',
  	'username' => 'root',
  	'password' => '',
  	'database' => 'apadrina',
  	'dbdriver' => 'mysqli',
  	'dbprefix' => '',
  	'pconnect' => FALSE,
  	'db_debug' => (ENVIRONMENT !== 'production'),
  	'cache_on' => FALSE,
  	'cachedir' => '',
  	'char_set' => 'utf8',
  	'dbcollat' => 'utf8_general_ci',
  	'swap_pre' => '',
  	'encrypt' => FALSE,
  	'compress' => FALSE,
  	'stricton' => FALSE,
  	'failover' => array(),
  	'save_queries' => TRUE
 );

// $db['default'] = array(
//   'dsn' => '',
//   'hostname' => 'kenzoawadmin.mysql.db',
//   'username' => 'kenzoawadmin',
//   'password' => 'KenzoawAdmin2021',
//   'database' => 'kenzoawadmin',
//   'dbdriver' => 'mysqli',
//   'dbprefix' => '',
//   'pconnect' => FALSE,
//   'db_debug' => (ENVIRONMENT !== 'production'),
//   'cache_on' => FALSE,
//   'cachedir' => '',
//   'char_set' => 'utf8',
//   'dbcollat' => 'utf8_general_ci',
//   'swap_pre' => '',
//   'encrypt' => FALSE,
//   'compress' => FALSE,
//   'stricton' => FALSE,
//   'failover' => array(),
//   'save_queries' => TRUE
// );
