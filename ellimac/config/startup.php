<?php
/**
 * Ellimac
 *
 * This is a project made by Camille Peter.
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2017 w-vision | Woche-Pass AG (https://www.w-vision.ch)
 */

// show all errors
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

// define constants
$ellimacDocumentRoot = realpath(dirname(__FILE__) . '/../..');

if (!defined("ELLIMAC_DOCUMENT_ROOT")) {
    define("ELLIMAC_DOCUMENT_ROOT", $ellimacDocumentRoot);
}

if (!defined("ELLIMAC_FRONTEND_MODULE")) {
    define("ELLIMAC_FRONTEND_MODULE", "website");
}

if (!defined("ELLIMAC_PATH")) {
    define("ELLIMAC_PATH", ELLIMAC_DOCUMENT_ROOT . "/ellimac");
}

if (!defined("ELLIMAC_WEBSITE_PATH")) {
    define("ELLIMAC_WEBSITE_PATH", ELLIMAC_DOCUMENT_ROOT . "/" . ELLIMAC_FRONTEND_MODULE);
}

if (!defined("ELLIMAC_WEBSITE_VAR")) {
    define("ELLIMAC_WEBSITE_VAR", ELLIMAC_WEBSITE_PATH . "/var");
}

if (!defined("ELLIMAC_CONFIGURATION_DIRECTORY")) {
    define("ELLIMAC_CONFIGURATION_DIRECTORY", ELLIMAC_WEBSITE_VAR . "/config");
}

// setup include paths
$includePaths = [
    ELLIMAC_PATH . "/lib",
    ELLIMAC_PATH . "/models"
];
set_include_path(implode(PATH_SEPARATOR, $includePaths) . PATH_SEPARATOR);

// helper functions
include(dirname(__FILE__) . "/helper.php");

// setup zend framework and ellimac
require_once ELLIMAC_PATH . "/lib/Ellimac.php";
require_once ELLIMAC_PATH . "/lib/Ellimac/Loader/Autoloader.php";
$loader = require ELLIMAC_DOCUMENT_ROOT . "/vendor/autoload.php";

$autoloader = \Zend_Loader_Autoloader::getInstance();
$autoloader->suppressNotFoundWarnings(false);
$autoloader->setFallbackAutoloader(false);
$autoloader->registerNamespace('Ellimac');

$loader->unregister();
$loader->register(true);

$compatibilityClassLoader = new \Ellimac\Loader\CompatibilityAutoloader($loader);
$compatibilityClassLoader->register(true);


