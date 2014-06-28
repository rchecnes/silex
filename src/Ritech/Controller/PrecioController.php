<?php
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PrecioController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('view/Precio/precio.html.twig', $data);

    }
}