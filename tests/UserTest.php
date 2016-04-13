<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/04/16
 * Time: 13:55
 */

namespace Itb;
use Itb\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $user = new User();
        $user->setId(1);

        $expectedResult = 1;
        $result = $user->getId();

        $this->assertEquals($expectedResult,$result);
    }


    public function testGetUsername()
    {
        $user = new User();
        $user->setUserName("bob");

        $expectedResult = "bob";
        $result = $user->getUsername();

        $this->assertEquals($expectedResult,$result);
    }


    public function testGetRole()
    {
        $user = new User();
        $user->setRole(1);

        $expectedResult = 1;
        $result = $user->getRole();

        $this->assertEquals($expectedResult,$result);
    }


    public function testGetPassword()
    {
        $user = new User();
        $user->setPassword("1234");

        $expectedResult = "1234";
        $result = $user->getPassword();
        $boolean = password_verify($result, $expectedResult);
        $boolean2 = true;
        $this->assertNotEquals($boolean, $boolean2);
    }
} 