<?php
// archivo src/Controller.php
namespace rchecnes;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/**
*
*/
class ServicesController
{
    public function show(Application $app, Resquest $request)
    {
        //$data['saludos'] = "hola";
        //echo "holaaaaa ya llegamos a clases";
        //return $app['twig']->render('services.html.twig', $data);
        return "holaaaaa";
    }
}
