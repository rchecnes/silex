<?php
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PortafolioController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('view/Portafolio/portafolio.html.twig', $data);

    }
}