<?php
// autoloader
// ------------
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/configDatabase.php';
require_once __DIR__ . '/../src/utility/helperFunctions.php';

// my settings
// ------------
$myTemplatesPath = __DIR__ . '/../templates';

// setup Twig
// ------------
$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

// setup Silex
// ------------
$app = new Silex\Application();
//$app['debug'] = true;

// register Session provider with Silex
// -------------------------
$app->register(new Silex\Provider\SessionServiceProvider());

// register Twig with Silex
// ------------
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $myTemplatesPath
));
