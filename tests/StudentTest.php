<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/04/16
 * Time: 13:55
 */

namespace Itb;
use Itb\Student;

/**
 * testing the Student class
 * Class StudentTest
 * @package Itb
 */
class StudentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testing id
     */
    public function testGetId()
    {
        $student = new student();
        $student->setId(1);

        $expectedResult = 1;
        $result = $student->getId();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing role
     */
    public function testGetRole()
    {
        $student = new student();
        $student->setRole(1);

        $expectedResult = 1;
        $result = $student->getRole();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing next grading
     */
    public function testGetNextGrading()
    {
        $student = new student();
        $student->setNextGrading("david");

        $expectedResult = "david";
        $result = $student->getNextgrading();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing first name
     */
    public function testGetFirstName()
    {
        $student = new student();
        $student->setFirstName("david");

        $expectedResult = "david";
        $result = $student->getFirstname();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing surname
     */
    public function testGetSurname()
    {
        $student = new student();
        $student->setSurname("grey");

        $expectedResult = "grey";
        $result = $student->getSurname();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing current belt grade
     */
    public function testGetCurrentBeltGrade()
    {
        $student = new student();
        $student->setCurrentbeltgrade("white");

        $expectedResult = "white";
        $result = $student->getCurrentbeltgrade();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing current status
     */
    public function testGetCurrentStatus()
    {
        $student = new student();
        $student->setCurrentStatus("active");

        $expectedResult = "active";
        $result = $student->getCurrentStatus();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing next belt grading syllabus
     */
    public function testGetNextBeltGradingSyllabus()
    {
        $student = new student();
        $student->setNextBeltGradingSyllabus("grey");

        $expectedResult = "grey";
        $result = $student->getNextBeltGradingSyllabus();

        $this->assertEquals($expectedResult,$result);
    }

    /**
     * testing required status
     */
    public function testGetRequiredStatus()
    {
        $student = new student();
        $student->setRequiredStatus("active");

        $expectedResult = "active";
        $result = $student->getRequiredStatus();

        $this->assertEquals($expectedResult,$result);
    }
} 