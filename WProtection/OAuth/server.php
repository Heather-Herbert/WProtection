<?php


require_once(__DIR__.'/../vendor/bshaffer/oauth2-server-php/src/OAuth2/Autoloader.php');
require_once(__DIR__.'/../Classes/settings.php');

// error reporting (this is a demo, after all!)
ini_set('display_errors',1);error_reporting(E_ALL);

// Autoloading (composer is preferred, but for this example let's just do this)
OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array('dsn' => WProtection\settings::$DB_DSN, 'username' => WProtection\settings::$DB_PASS, 'password' => WProtection\settings::$DB_USER));

// Pass a storage object or array of storage objects to the OAuth2 server class
$server = new OAuth2\Server($storage);

// Add the "Client Credentials" grant type (it is the simplest of the grant types)
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));

// Add the "Authorization Code" grant type (this is where the oauth magic happens)
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));