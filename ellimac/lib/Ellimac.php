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
                echo 'projects overview';
            });

            // will result in '/projects/new'
            $router->get('/new', function() {
                echo 'create a new project';
            });

            // will result in '/projects/id'
            $router->get('/(\d+)', function($id) {
                echo 'project id ' . htmlentities($id);
            });

            // will result in '/projects/id/edit'
            $router->get('/(\d+)/edit', function($id) {
                echo 'edit project id ' . htmlentities($id);
            });

        });

        $router->run();
    }
}

