<?php

namespace Itb\Model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class ClassTable timetable methods
 * Class ClassTable
 * @package Itb\Model
 */
class ClassTable extends DatabaseTable
{
    /**
     * id
     * @var int
     */
    private $id;

    /**
     * day
     * @var String
     */
    private $day;

    /**
     * activity
     * @var String
     */
    private $activity;

    /**
     * time
     * @var String
     */
    private $time;

    /**
     * grade
     * @var String
     */
    private $grade;

    /**
     * sets activity variable
     * @param String $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * gets activity variable
     * @return String
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * sets day variable
     * @param String $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * gets day variable
     * @return String
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * sets grade variable
     * @param String $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * gets grade variable
     * @return String
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * sets id variable
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * gets id variable
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * sets time variable
     * @param String $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * gets time variable
     * @return String
     */
    public function getTime()
    {
        return $this->time;
    }
}
