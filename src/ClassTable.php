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
 * Class ClassTable timetable
 * @package Itb
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
     * @param String $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return String
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param String $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return String
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param String $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return String
     */
    public function getGrade()
    {
        return $this->grade;
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
