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

namespace Ellimac\Model\Client;


class ClientModel
{
    private $name;
    private $address;
    private $zipCode;
    private $city;

    /**
     * ClientModel constructor.
     * @param $name from client
     * @param $address from client
     * @param $code from client
     * @param $city from client
     */
    public function __construct($name, $address, $code, $city)
    {
        $this->name = $name;
        $this->address = $address;
        $this->zipCode = $code;
        $this->city = $city;
    }

    /**
     * @return name from client
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param set name from client
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return adress from client
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param set address from client
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return zipCode from client
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param set zipCode from client
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return city of client
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param set city from client
     */
    public function setCity($city)
    {
        $this->city = $city;
    }



    function __toString()
    {
       return 'foofoo';
    }

}
//TODO: Model fertig stellen