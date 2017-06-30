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

namespace Ellimac\Controller\Action;

use Ellimac\Controller\Action;
use Ellimac\Config;

abstract class Frontend extends Action
{
    /**
     * @var \Ellimac\Config\Config
     */
    public $config;

    /**
     * @var bool
     */
    protected $viewRendered = false;

    /**
     * @var bool
     */
    public static $isInitial = true;

    /**
     * Initializes the main frontend controller
     */
    public function init()
    {
        parent::init();

        if (self::$isInitial) {
            // do something initially
        }

        // init website config
        $config = Config::getSystemConfig();
        $this->config = $config;
        $this->view->config = $config;

        // assign variables
        $this->view->controller = $this;

        self::$isInitial = false;
    }

    /**
     * @return \Zend_Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     *
     */
    protected function forceRender()
    {
        if (!$this->viewRendered) {
            if ($script = $this->getRenderScript()) {
                $this->renderScript($script);
            } else {
                $this->render();
            }
        }
    }
}
