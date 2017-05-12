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

namespace Ellimac;

use Ellimac\Model;
use Ellimac\Model\Element;

class View extends \Zend_View {
    /**
     * @var \Zend_Controller_Request_Abstract
     */
    protected $request;

    /**
     * @param $type
     * @param $realName
     * @param array $options
     * @return Model\Document\Tag
     */
    public function tag($type, $realName, $options = array()) {
        $type = strtolower($type);
        try {
            $document = $this->document;
            $name = Model\Document\Tag::buildTagName($type,$realName, $document);
            if($document instanceof Model\Document) {
                $tag = $document->getElement($name);
                if ($tag instanceof Model\Document\Tag && $tag->getType() == $type) {
                    // call the load() method if it exists to reinitialize the data (eg. from serializing, ...)
                    if(method_exists($tag, "load")) {
                        $tag->load();
                    }
                    // set view & controller, editmode
                    $tag->setController($this->controller);
                    $tag->setView($this);
                    $tag->setEditmode($this->editmode);

                    $tag->setOptions($options);
                }
                else {
                    $tag = Model\Document\Tag::factory($type, $name, $document->getId(), $options, $this->controller, $this, $this->editmode);
                    $document->setElement($name, $tag);
                }
                // set the real name of this editable, without the prefixes and suffixes from blocks and areablocks
                $tag->setRealName($realName);
            }

            return $tag;
        }
        catch (\Exception $e) {
            \Logger::warning($e);
        }
    }

    /**
     * @return \Zend_Controller_Request_Http
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @param \Zend_Controller_Request_Abstract $request
     * @return void
     */
    public function setRequest(\Zend_Controller_Request_Abstract $request) {
        $this->request = $request;
        return $this;
    }
}


