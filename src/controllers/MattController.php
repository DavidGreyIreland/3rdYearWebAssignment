<?php
namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\ClassTable;

class MattController
{
    public function indexAction(Request $request, Application $app)
    {
        print 'I am in MattController::indexAction()';
        print '<hr>';

        $app['session']->set('user', ['username' => 'matt']);
        $user = $app['session']->get('user');
        var_dump($user);


        $classTables = ClassTable::getAll();
        $argsArray = [
            'classTables' => $classTables,
        ];
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
