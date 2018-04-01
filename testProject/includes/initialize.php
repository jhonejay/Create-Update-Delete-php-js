<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].'');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.'/CRUD/testProject/'.'includes');

include_once('mysql2i.class.php'); 
// load config file first
require_once(LIB_PATH.'/config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.'/functions.php');

// load core objects
//require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.'/database.php');
require_once(LIB_PATH.'/database_object.php');

// load database-related classes
require_once(LIB_PATH.'/class.crudinfo.php');



?>