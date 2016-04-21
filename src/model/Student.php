<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 20/02/2016
 * Time: 20:00
 */
namespace Itb\Model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Student manages student details
 * @package Itb
 */
class Student extends DatabaseTable
{
    /**
     * user role
     * @var const
     */
    const ROLE_USER = 0;

    /**
     * admin role
     * @var const
     */
    const ROLE_ADMIN = 1;

    /**
     * id
     * @var int
     */
    private $id;

    /**
     * currentBeltGrade
     * @var String
     */
    private $currentBeltGrade;

    /**
     * nextBeltGradingSyllabus
     * @var String
     */
    private $nextBeltGradingSyllabus;

    /**
     * currentStatus
     * @var String
     */
    private $currentStatus;

    /**
     * requiredStatus
     * @var String
     */
    private $requiredStatus;

    /**
     * $nextGrading
     * @var String
     */
    private $nextGrading;

    /**
     * firstname
     * @var String
     */
    private $firstName;

    /**
     * surname
     * @var String
     */
    private $surname;

    /**
     * role
     * @var int
     */
    private $role;

    /**
     * @param int $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * sets firstname
     * @param String $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * gets firstname
     * @return String
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * sets surname
     * @param String $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * gets surname
     * @return String
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * sets current belt grade
     * @param String $currentBeltGrade
     */
    public function setCurrentBeltGrade($currentBeltGrade)
    {
        $this->currentBeltGrade = $currentBeltGrade;
    }

    /**
     * gets current belt grade
     * @return String
     */
    public function getCurrentBeltGrade()
    {
        return $this->currentBeltGrade;
    }

    /**
     * sets current status
     * @param String $currentStatus
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * gets current status
     * @return String
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * sets next belt grading syllabus
     * @param String $nextBeltGradingSyllabus
     */
    public function setNextBeltGradingSyllabus($nextBeltGradingSyllabus)
    {
        $this->nextBeltGradingSyllabus = $nextBeltGradingSyllabus;
    }

    /**
     * gets next belt grading syllabus
     * @return String
     */
    public function getNextBeltGradingSyllabus()
    {
        return $this->nextBeltGradingSyllabus;
    }

    /**
     * sets next grading
     * @param String $nextGrading
     */
    public function setNextGrading($nextGrading)
    {
        $this->nextGrading = $nextGrading;
    }

    /**
     * gets next grading
     * @return String
     */
    public function getNextGrading()
    {
        return $this->nextGrading;
    }

    /**
     * sets required status
     * @param String $requiredStatus
     */
    public function setRequiredStatus($requiredStatus)
    {
        $this->requiredStatus = $requiredStatus;
    }

    /**
     * gets required status
     * @return String
     */
    public function getRequiredStatus()
    {
        return $this->requiredStatus;
    }

    /**
     * sets id
     * @param int $studentId
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * gets id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     * @param $id
     *
     * @return object|null
     */
    public static function getOneByUsername($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM students WHERE id=:id';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
