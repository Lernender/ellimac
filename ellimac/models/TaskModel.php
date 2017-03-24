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
     * @param $title from task
     * @param $description from task
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return title from task
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param set title from task
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return description from task
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param set description from task
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

//TODO: Model fertig stellen