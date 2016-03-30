<?php
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

class Student extends DatabaseTable
{
    private $studentId;
    private $currentBeltGrade;
    private $nextBeltGradingSyllabus;
    private $currentStatus;
    private $requiredStatus;
    private $nextGrading;

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
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }


} 