<?php
// archivo src/Controller.php
namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/**
*
*/
class ServicesController
{

    function __construct()
    {
        # code...
    }

    public function showAction(Resquest $Request, Application $app)
    {
        //$data['saludos'] = "hola";
        //echo "holaaaaa ya llegamos a clases";
        //return $app['twig']->render('services.html.twig', $data);
    }
}

?>