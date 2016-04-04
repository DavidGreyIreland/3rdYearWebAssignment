<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/configDatabase.php';
require_once __DIR__ . '/../app/setup.php';
require_once __DIR__ . '/../src/utility/helperFunctions.php';

//use Itb\MainController;
//use Itb\UserController;
//use Itb\AdminController;



$app->get('/',      controller('Itb', 'main/index'));
$app->get('/contact',      controller('Itb', 'main/contact'));
$app->get('/sitemap',      controller('Itb', 'main/sitemap'));

// ------ SECURE PAGES ----------
$app->get('/admin',  controller('Itb', 'admin/index'));
$app->get('/adminCodes',  controller('Itb', 'admin/codes'));


$app->get('/adminIndex',  controller('Itb', 'admin/adminIndex'));
$app->get('/studentIndex',  controller('Itb', 'admin/studentIndex'));

// ------ login routes GET ------------
$app->get('/login',  controller('Itb', 'login/login'));
$app->get('/logout',  controller('Itb', 'login/logout'));

// ------ login routes POST (process submitted form)     ------------
$app->post('/login',  controller('Itb', 'login/processLogin'));



// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            return \Itb\MainController::error404($app, $message);

        default:
            $message = 'We are sorry, but something went terribly wrong.';
            return \Itb\MainController::error404($app, $message);
    }
});

// run Silex front controller
// ------------
$app->run();


