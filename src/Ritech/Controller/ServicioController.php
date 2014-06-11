<?php
// archivo src/Controller.php
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/**
*
*/
class ServicioController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('servicio.html.twig', $data);

    }
}
