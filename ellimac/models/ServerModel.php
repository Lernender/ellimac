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

namespace Ellimac\Model\Server;


class ServerModel
{
    private $name;
    private $ip;

    /**
     * ServerModel constructor.
     * @param $name from server
     * @param $ip from server
     */
    public function __construct($name, $ip)
    {
        $this->name = $name;
        $this->ip = $ip;
    }

    /**
     * @return name from server
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param set name from server
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ip from server
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param set ip from server
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
}

//TODO: Model fertig stellen