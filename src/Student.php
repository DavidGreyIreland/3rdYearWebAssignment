<?php
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class Student extends DatabaseTable
{
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    private $id;
    private $currentBeltGrade;
    private $nextBeltGradingSyllabus;
    private $currentStatus;
    private $requiredStatus;
    private $nextGrading;
    private $firstName;
    private $surname;
    private $role;

    /**
     * @param mixed $admin
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $currentBeltGrade
     */
    public function setCurrentBeltGrade($currentBeltGrade)
    {
        $this->currentBeltGrade = $currentBeltGrade;
    }

    /**
     * @return mixed
     */
    public function getCurrentBeltGrade()
    {
        return $this->currentBeltGrade;
    }

    /**
     * @param mixed $currentStatus
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * @return mixed
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * @param mixed $nextBeltGradingSyllabus
     */
    public function setNextBeltGradingSyllabus($nextBeltGradingSyllabus)
    {
        $this->nextBeltGradingSyllabus = $nextBeltGradingSyllabus;
    }

    /**
     * @return mixed
     */
    public function getNextBeltGradingSyllabus()
    {
        return $this->nextBeltGradingSyllabus;
    }

    /**
     * @param mixed $nextGrading
     */
    public function setNextGrading($nextGrading)
    {
        $this->nextGrading = $nextGrading;
    }

    /**
     * @return mixed
     */
    public function getNextGrading()
    {
        return $this->nextGrading;
    }

    /**
     * @param mixed $requiredStatus
     */
    public function setRequiredStatus($requiredStatus)
    {
        $this->requiredStatus = $requiredStatus;
    }

    /**
     * @return mixed
     */
    public function getRequiredStatus()
    {
        return $this->requiredStatus;
    }

    /**
     * @param mixed $studentId
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
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     *
     * @return mixed|null
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

        if ($object = $statement->fetch())
        {
            return $object;
        } else {
            return null;
        }
    }
} 