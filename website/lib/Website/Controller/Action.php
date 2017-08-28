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

namespace Website\Controller;

use Ellimac\Controller\Action\Frontend;

class Action extends Frontend
{
    // TODO: create main action

    public function init()
    {
        if (self::$isInitial) {
            // only do this once
            // eg. registering view helpers or other generic things
        }

        parent::init();

        if (\Zend_Registry::isRegistered("Zend_Locale")) {
            $locale = \Zend_Registry::get("Zend_Locale");
        } else {
            $locale = new \Zend_Locale("en");
            \Zend_Registry::set("Zend_Locale", $locale);
        }

        $this->view->language = (string) $locale;
        $this->language = (string) $locale;
    }
}