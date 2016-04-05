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

}