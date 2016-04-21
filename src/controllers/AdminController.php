<?php
/**
 * class for all admin methods
 */
namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\Student;
use Itb\Model\Attendance;

/**
 * Class AdminController controls admin methods
 * @package Itb\Controller
 */
class AdminController
{
    /**
     * sends an array to the adminIndex page
     * @param Application $app
     * @return mixed
     */
    public function adminIndexAction(Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'adminIndex';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * sends an array to the attendance table
     * @param Application $app
     * @return mixed
     */
    public function adminAttendanceAction(Application $app)
    {
        $attendances = Attendance::getAll();
        $argsArray = [
            'attendances' => $attendances,
        ];
        $templateName = 'adminAttendance';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * action for route:    /adminCodes will we allow access to the Admin home?
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function codesAction(Application $app)
    {
        
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if (!$isAuthenticated) {
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


    /**
     * displays a student list
     * @param Application $app
     * @return mixed
     */
    public function adminStudentListAction(Application $app)
    {
        $students = Student::getAll();
        $argsArray = [
            'students' => $students,
        ];
        $templateName = 'adminStudentList';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * processes updates and removes
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function processUpdateRemoveStudentAction(Request $request, Application $app)
    {
        $paramsPost = $request->request->all();
/*        var_dump("hey there");
        die();*/
        if ($paramsPost['update']) {
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

            return $app->redirect('/adminStudentList');
        } elseif ($paramsPost['remove']) {
            $id = $paramsPost['id'];
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            Student::delete($id);

            return $app->redirect('/adminStudentList');
        }
    }

    /**
     * processes adding students
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function processAddStudentAction(Request $request, Application $app)
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

        return $app->redirect('/adminStudentList');
    }
}
