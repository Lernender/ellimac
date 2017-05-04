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

class Project
{
    private $name;
    private $url;
    private $sta;

    /**
     * ProjectModel constructor.
     * @param $name from project
     * @param $url from project
     */
    public function __construct($name, $url, $sta)
    {
        $this->name = $name;
        $this->url = $url;
        $this->sta = $sta
    }

    /**
     * @return name from project
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param set name from project
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return url from project
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param set url from project
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return stade from project
     */
    public function getSta()
    {
        return $this->sta;
    }

    public function setSta($sta)
    {
        $this->sta = $sta;
    }

}

//TODO: Model fertig stellen