<?php
defined('BASEPATH') or exit('No direct script access allowed');



// on web

// localhost
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db_name = "db_serv";

// localhost
$host = "34.142.245.97";
$user = "dev-db";
$pass = "123456";
$db_name = "db_serv";


$active_group = 'default';
$query_builder = TRUE;


$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $host,
	'username' => $user,
	'password' => $pass,
	'database' => $db_name,
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
