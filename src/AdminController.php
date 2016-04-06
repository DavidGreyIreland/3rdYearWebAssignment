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

        $argsArray = [
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


    public function removeStudentFormAction(Request $request, Application $app)
    {
        $argsArray = [
        ];
        $templateName = 'addStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
/*        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        $deleteSuccess = Student::delete($id);

        if($deleteSuccess){
            return $app->redirect('/login');
        }
        else
        {
            return $app->redirect('/contact');
        }
*/
    }


    public function editStudentAction(Request $request, Application $app)
    {
        $argsArray = [
        ];
        $templateName = 'editStudent';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}