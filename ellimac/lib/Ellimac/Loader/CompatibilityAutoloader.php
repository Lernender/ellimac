<?php
/*/**
 * Ellimac
 *
 * This is a project made by Camille Peter.
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2017 w-vision | Woche-Pass AG (https://www.w-vision.ch)
 */

namespace Ellimac\Loader;

//use Ellimac\Tool;

class CompatibilityAutoloader
{
    /**
     * @var null|\Composer\Autoload\ClassLoader
     */
    protected $composerAutoloader = null;

    /**
     * CompatibilityAutoloader constructor.
     * @param $composerAutoloader
     */
    public function __construct($composerAutoloader)
    {
        $this->composerAutoloader = $composerAutoloader;
    }

    /**
     * @param $class
     * @return bool
     */
    public function loadClass($class)
    {

        // reverse compatibility from namespaced to prefixed class names e.g. Pimcore\Model\Document => Document
        if (strpos($class, "Ellimac\\") === 0) {

            // first check for a model, if it doesnt't work fall back to the default autoloader
            if (!class_exists($class, false) && !interface_exists($class, false)) {
                $this->composerAutoloader->loadClass($class);
            }

        }
    }

    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadClass'], true, $prepend);
    }
}
