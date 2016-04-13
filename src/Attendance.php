<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 20/02/2016
 * Time: 20:00
 */
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Attendance
 * @package Itb
 */
class Attendance extends DatabaseTable
{
    /**
     * id
     * @var int
     */
    private $id;

    /**
     * time
     * @var String
     */
    private $time;

    /**
     * class
     * @var String
     */
    private $class;


    /**
     * @param String $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return String
     */
    public function getClass()
    {
        return $this->class;
    }


    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param String $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }


    /**
     * @return String
     */
    public function getTime()
    {
        return $this->time;
    }
} 