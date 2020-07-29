<?php

/**
* config.php
* contains all the configuration settings used within the website
* @author Johnathan Tiong <johnathan.tiong@gmail.com>
*/

// ENVIRONMENT SETTINGS
define("ENVIRONMENT", "development");               // development, staging, production
define("BASE_URL", "http://lanparty.local");        // URL

// DATABASE SETTINGS
define("DB_TYPE", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "database");
define("DB_USER", "username");
define("DB_PASS", "password");

// GOOGLE RECPATCHA API
define("RECAPTCHA_PUBLIC", "");
define("RECAPTCHA_SECRET", "");

// STRIPE PAYMENTS API
define("STRIPE_PK_LIVE", "");
define("STRIPE_SK_LIVE", "");
define("STRIPE_PK_TEST", "");
define("STRIPE_SK_TEST", "");
