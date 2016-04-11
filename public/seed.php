<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/configDatabase.php';

use Itb\User;
use Itb\Student;

/*define('DB_HOST','localhost');
define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'itb');*/

$student1 = new Student();
$student1->setFirstName('david');
$student1->setSurname('Grey');
$student1->setCurrentStatus('active');
$student1->setNextBeltGradingSyllabus('sure');
$student1->setCurrentBeltGrade('rainbow');
$student1->setRequiredStatus('i guess');
$student1->setNextGrading('ok');
$student1->setRole(Student::ROLE_ADMIN);
Student::insert($student1);

$student2 = new Student();
$student2->setFirstName('john');
$student2->setSurname('Grey');
$student2->setCurrentStatus('active');
$student2->setNextBeltGradingSyllabus('sure');
$student2->setCurrentBeltGrade('rainbow');
$student2->setRequiredStatus('i guess');
$student2->setNextGrading('ok');
$student2->setRole(Student::ROLE_USER);
Student::insert($student2);

$matt = new User();
$matt->setUsername('david');
$matt->setPassword('1234');
$matt->setRole(User::ROLE_ADMIN);
User::insert($matt);

$joe = new User();
$joe->setUsername('john');
$joe->setPassword('1234');
$joe->setRole(User::ROLE_USER);
User::insert($joe);

$admin = new User();
$admin->setUsername('admin');
$admin->setPassword('admin');
$admin->setRole(User::ROLE_ADMIN);
User::insert($admin);

$users = User::getAll();
var_dump($users);

$students = Student::getAll();
var_dump($students);