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


namespace Ellimac\Model\Project;


class ProjectModel
{
    private $name;
    private $url;

    /**
     * ProjectModel constructor.
     * @param $name from project
     * @param $url from project
     */
    public function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = $url;
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
}

//TODO: Model fertig stellen