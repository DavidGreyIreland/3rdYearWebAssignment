<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/configDatabase.php';

use Itb\User;

/*define('DB_HOST','localhost');
define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'itb');*/

$matt = new User();
$matt->setUsername('david');
$matt->setPassword('1234');
$matt->setRole(User::ROLE_ADMIN);

$joe = new User();
$joe->setUsername('john');
$joe->setPassword('1234');
$joe->setRole(User::ROLE_USER);

$admin = new User();
$admin->setUsername('admin');
$admin->setPassword('admin');
$admin->setRole(User::ROLE_ADMIN);

User::insert($matt);
User::insert($joe);
User::insert($admin);

$users = User::getAll();

var_dump($users);