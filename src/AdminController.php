<?php

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AdminController
{
    // action for route:    /admin
    // will we allow access to the Admin home?
    public function adminIndexAction(Request $request, Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'adminIndex';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    // action for route:    /adminCodes
    // will we allow access to the Admin home?
    public function codesAction(Request $request, Application $app)
    {
        
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'codes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    // this is the student table shown on the admin index page
    public function adminStudentTableAction(Request $request, Application $app)
    {
        $argsArray = [
        ];
        $templateName = 'adminStudentTableAction';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function addStudentAction(Request $request, Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'addStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function removeStudentAction(Request $request, Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'removeStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }

    public function addStudentFormAction(Request $request, Application $app)
    {
        $paramsPost = $request->request->all();

        $firstName = $paramsPost['firstName'];
        $surname = $paramsPost['surname'];
        $currentBeltGrading = $paramsPost['currentBeltGrading'];
        $nextGrading = $paramsPost['nextGrading'];
        $currentStatus = $paramsPost['currentStatus'];
        $requiredStatus = $paramsPost['requiredStatus'];
        $admin = $paramsPost['role'];
        $nextBeltGradingSyllabus = $paramsPost['nextBeltGradingSyllabus'];

        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
        $surname = filter_var($surname, FILTER_SANITIZE_STRING);
        $currentBeltGrade = filter_var($currentBeltGrading, FILTER_SANITIZE_STRING);
        $nextBeltGradingSyllabus = filter_var($nextBeltGradingSyllabus, FILTER_SANITIZE_STRING);
        $currentStatus = filter_var($currentStatus, FILTER_SANITIZE_STRING);
        $requiredStatus = filter_var($requiredStatus, FILTER_SANITIZE_STRING);
        $nextGrading = filter_var($nextGrading, FILTER_SANITIZE_STRING);
        $admin = filter_var($admin, FILTER_SANITIZE_NUMBER_INT);

        $students = new Student();
        $students->setFirstName($firstName);
        $students->setSurname($surname);
        $students->setCurrentBeltGrade($currentBeltGrade);
        $students->setNextBeltGradingSyllabus($nextBeltGradingSyllabus);
        $students->setCurrentStatus($currentStatus);
        $students->setRequiredStatus($requiredStatus);
        $students->setNextGrading($nextGrading);
        $students->setRole($admin);

        Student::insert($students);

        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'addStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function removeStudentFormAction(Request $request, Application $app, $id)
    {
        Student::delete($id);

        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'removeStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function updateStudentFormAction(Request $request, Application $app)
    {
        $paramsPost = $request->request->all();

        $id = $paramsPost['id'];
        $firstName = $paramsPost['firstName'];
        $surname = $paramsPost['surname'];
        $currentBeltGrading = $paramsPost['currentBeltGrading'];
        $nextGrading = $paramsPost['nextGrading'];
        $currentStatus = $paramsPost['currentStatus'];
        $requiredStatus = $paramsPost['requiredStatus'];
        $admin = $paramsPost['role'];
        $nextBeltGradingSyllabus = $paramsPost['nextBeltGradingSyllabus'];

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
        $surname = filter_var($surname, FILTER_SANITIZE_STRING);
        $currentBeltGrade = filter_var($currentBeltGrading, FILTER_SANITIZE_STRING);
        $nextBeltGradingSyllabus = filter_var($nextBeltGradingSyllabus, FILTER_SANITIZE_STRING);
        $currentStatus = filter_var($currentStatus, FILTER_SANITIZE_STRING);
        $requiredStatus = filter_var($requiredStatus, FILTER_SANITIZE_STRING);
        $nextGrading = filter_var($nextGrading, FILTER_SANITIZE_STRING);
        $admin = filter_var($admin, FILTER_SANITIZE_NUMBER_INT);

        $students = new Student();
        $students->setId($id);
        $students->setFirstName($firstName);
        $students->setSurname($surname);
        $students->setCurrentBeltGrade($currentBeltGrade);
        $students->setNextBeltGradingSyllabus($nextBeltGradingSyllabus);
        $students->setCurrentStatus($currentStatus);
        $students->setRequiredStatus($requiredStatus);
        $students->setNextGrading($nextGrading);
        $students->setRole($admin);

        Student::update($students);

        $students = Student::getAll();

        //var_dump($students);
        //die();

        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'updateStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function updateStudentAction(Request $request, Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'updateStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}