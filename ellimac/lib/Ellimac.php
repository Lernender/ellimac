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

use Ellimac\Config;
use Ellimac\Router;

class Ellimac
{
    public static function run()
    {

        if (Config::locateConfigFile('system.php')) {
            self::initRouter();
        }
    }

    protected static function initRouter()
    {
        $router = new Router();

        $router->mount('/projects', function() use ($router) {
            // will result in '/projects/'
            $router->get('/', function() {
                include_once ELLIMAC_WEBSITE_PATH . "/views/scripts/index-main.php";
            });

            // will result in '/projects/new'
            $router->get('/new', function() {
                include_once ELLIMAC_WEBSITE_PATH . "/views/scripts/new.php";
            });

            // will result in '/projects/id'
            $router->get('/(\d+)', function($id) {
                include_once ELLIMAC_WEBSITE_PATH . "/views/scripts/details-main.php";
            });

            // will result in '/projects/id/edit'
            $router->get('/(\d+)/edit', function($id) {
                include_once ELLIMAC_WEBSITE_PATH . "/views/scripts/edit-main.php";
            });

        });

        $router->run();
    }
}

