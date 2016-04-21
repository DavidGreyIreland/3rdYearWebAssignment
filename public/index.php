<?php
require_once __DIR__ . '/../app/setup.php';

// ------ MAIN PAGES ----------
//$app->get('/',      controller('Itb\Controller', 'main/index'));



$app->get('/',      'Itb\Controller\MainController::indexAction');
$app->get('/sitemap',      'Itb\Controller\MainController::sitemapAction');
$app->get('/contact',      'Itb\Controller\MainController::contactAction');


// ------ SECURE PAGES ----------

$app->get('/adminAttendance',  'Itb\Controller\AdminController::adminAttendanceAction');
$app->get('/admin',  'Itb\Controller\AdminController::adminIndexAction');
$app->get('/adminStudentList',  'Itb\Controller\AdminController::adminStudentListAction');
$app->get('/adminCodes',  'Itb\Controller\AdminController::codesAction');

$app->post('/processUpdateRemoveStudent',  'Itb\Controller\AdminController::processUpdateRemoveStudentAction');
$app->post('/processAddStudent',  'Itb\Controller\AdminController::processAddStudentAction');

// ------ login routes GET ------------
//$app->get('/login',  'Itb\Controller\LoginController::loginAction');
$app->get('/login',      'Itb\Controller\LoginController::loginAction');
$app->get('/logout',  'Itb\Controller\LoginController::logoutAction');

// ------ login routes POST (process submitted form)     ------------
$app->post('/login',  'Itb\Controller\LoginController::processLoginAction');

$app->get('/student',  'Itb\Controller\StudentController::studentIndexAction');

// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            return \Itb\Controller\MainController::error404($app, $message);

        default:
            $message = 'We are sorry, but something went terribly wrong.';
            return \Itb\Controller\MainController::error404($app, $message);
    }
});

// run Silex front controller
// ------------
$app->run();


