<?php
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class InfoController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('view/Nosotros/info.html.twig', $data);

    }
}