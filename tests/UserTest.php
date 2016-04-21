<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/04/16
 * Time: 13:55
 */

namespace Itb\Tests;

use Itb\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testing id
     */
    public function testGetId()
    {
        $user = new User();
        $user->setId(1);

        $expectedResult = 1;
        $result = $user->getId();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing username
     */
    public function testGetUsername()
    {
        $user = new User();
        $user->setUserName("bob");

        $expectedResult = "bob";
        $result = $user->getUsername();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing role
     */
    public function testGetRole()
    {
        $user = new User();
        $user->setRole(1);

        $expectedResult = 1;
        $result = $user->getRole();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing password
     */
    public function testGetPassword()
    {
        $user = new User();
        $user->setPassword("1234");

        $expectedResult = "1234";
        $result = $user->getPassword();
        $boolean = password_verify($expectedResult, $result);
        $boolean2 = true;
        $this->assertEquals($boolean, $boolean2);
    }

    public function testCanFindMatchingUsernameAndPassword()
    {
        $user = new User();
        $user->setPassword("1234");

        $expectedResult = "1234";
        $result = $user->getPassword();
        $boolean = password_verify($expectedResult, $result);
        $boolean2 = true;
        $this->assertEquals($boolean, $boolean2);
    }

    public function testCanFindMatchingUsernameAndRole()
    {
        $user = new User();
        $user->setUsername("david");
        $user->setRole(1);

        $expectedResult = 1;
        $result = $user->getRole();

        $this->assertEquals($expectedResult, $result);
    }
}
