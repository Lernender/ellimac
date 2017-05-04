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


namespace Ellimac\Model;


class State
{
    private $name;

    /**
     * StateModel constructor.
     * @param $name from state
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return name from state
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param set name from state
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

//TODO: Model fertig stellen