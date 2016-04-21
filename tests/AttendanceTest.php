<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/04/16
 * Time: 13:55
 */

namespace Itb\Tests;

use Itb\Model\Attendance;

class AttendanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testing id
     */
    public function testGetId()
    {
        $att = new Attendance();
        $att->setId(1);

        $expectedResult = 1;
        $result = $att->getId();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing class
     */
    public function testGetClass()
    {
        $att = new Attendance();
        $att->setClass("morning");

        $expectedResult = "morning";
        $result = $att->getClass();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing time
     */
    public function testGetTime()
    {
        $att = new Attendance();
        $att->setTime("10:00");

        $expectedResult = "10:00";
        $result = $att->getTime();

        $this->assertEquals($expectedResult, $result);
    }
}
