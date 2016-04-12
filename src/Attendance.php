<?php
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

class Attendance extends DatabaseTable
{
    private $id;
    private $time;
    private $class;


    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }


    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }
} 