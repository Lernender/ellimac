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
//            Config::getSystemConfig();
            self::initRouter();
        }
    }

    public static function initRouter()
    {
        $router = new Router();

        //TODO: Add a route handler here (Ellimac -> Controller)

        $router->mount('/projects', function() use ($router) {
            // will result in '/projects/'
            $router->get('/', function() {
                //TODO: Fill in the needed parameters
                \Ellimac\Controller::setRoute([
                    'controller' => 'projects',
                    'action' => 'list'
                ]);
            });

            // will result in '/projects/new'
            $router->get('/new', function() {
//                self::setRoute([
//                    'controller' => 'projects',
//                    'action' => 'add'
//                ]);
            });

            // will result in '/projects/id'
            $router->get('/(\d+)', function($id) {
//                self::setRoute([
//                    'controller' => 'projects',
//                    'action' => 'detail'
//                ]);
            });

            // will result in '/projects/id/edit'
            $router->get('/(\d+)/edit', function($id) {
//                self::setRoute([
//                    'controller' => 'projects',
//                    'action' => 'edit'
//                ]);
            });

        });

        $router->run(function() {
            //TODO: Run the route handler
        });
    }
}

