<?php
defined('BASEPATH') or exit('No direct script access allowed');



// on web
// $host = "172.17.8.222";
// $user = "miscme";
// $pass ="2w#x3eDC)R";
// $db_name = "dbewarehouse";

// localhost
$host = "localhost";
$user = "root";
$pass = "";
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
