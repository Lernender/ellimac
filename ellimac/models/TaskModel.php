<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.03.17
 * Time: 14:33
 */

namespace Ellimac\Model\Task;


class TaskModel
{
    private $title;
    private $description;


    /**
     * TaskModel constructor.
     * @param $title
     * @param $description
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}