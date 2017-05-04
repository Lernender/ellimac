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



class Partner
{
    private $name;

    /**
     * PartnerModel constructor.
     * @param name from partner
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return name from partner
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param set name from partner
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

//TODO: Model fertig stellen
