<?php
namespace Itb;

class UserRepository
{
    private $users = [];
    
    public function __construct()
    {
        $matt = new User();
        $matt->setId(1);
        $matt->setUsername('matt');
        $matt->setPassword('smith');

        $joe = new User();
        $joe->setId(1);
        $joe->setUsername('joe');
        $joe->setPassword('bloggs');

        $admin = new User();
        $admin->setId(2);
        $admin->setUsername('admin');
        $admin->setPassword('admin');

        // add users to the array
        $this->users[1] = $matt;
        $this->users[2] = $admin;
        $this->users[3] = $joe;
    }

    public function getAll()
    {
        return $this->users;
    }

    public function getOneById($id)
    {
        if($id == 1 || $id == 2){
            return $this->users[$id];
        } else {
            return null;
        }
    }


    public function getOneByUsername($username)
    {
        foreach ($this->users as $user){
            /**
             * @var $user User
             */
            if($user->getUsername() == $username){
                return $user;
            }
        }

        // if we get here then we didn't find a user with the given username
        return null;
    }

    /**
     * return success (or not) of attempting to find matching username/password in the repo
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = $this->getOneByUsername($username);

        // if no record has this username, return FALSE
        if(null == $user){
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        // return whether or not hash of input password matches stored hash
        return password_verify($password, $hashedStoredPassword);
    }


}