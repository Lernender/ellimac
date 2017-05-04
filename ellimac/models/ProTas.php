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


class ProTas
{
    private $state;

    /**
     * ProTasModel constructor.
     * @param state from task of project
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return state from task of project
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param set state from task of project
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}

//TODO: Model fertig stellen