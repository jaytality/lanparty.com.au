<?php
/**
* PROJECT: lanparty.com.au
*
*
* @file: index.php
* @author: Johnathan Tiong <j.tiong@eleague.gg>
*/

session_start();

//
// CRITICAL STUFF - DO NOT EDIT
//
define('ROOT', dirname(__FILE__));
define('VIEW', ROOT.'/app/views');

// vendor for bootstrap
require 'vendor/autoload.php';

(@include_once(ROOT . '/config.php')) or die("<b>config.php</b> required");

// SETUP RedBeanPHP ORM core
R::setup(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

// RedBeanPHP: allow _ in bean names etc.
R::ext('xdispense', function ($type) {
    return R::getRedBean()->dispense($type);
});

// SETUP error logging
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('log_errors', 1);
ini_set('display_errors', 1);

// SITE TIMEZONE
date_default_timezone_set('Australia/Sydney');

$base = new Base;

// echo R::testConnection() ? 'connected to the DB' : 'not connected to the DB'; die();

// bootstrap file for doing regular checks every page load
include(ROOT.'/bootstrap.php');

// URL ROUTER
include(ROOT.'/routes.php');

R::close();
