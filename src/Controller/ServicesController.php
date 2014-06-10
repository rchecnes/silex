<?php
// archivo src/Controller.php
namespace Controllers;

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

    public function showServices(Application $app)
    {
        $data['saludos'] = "hola";
        //echo "holaaaaa";
        return $app['twig']->render('services.html.twig', $data);
    }
}

?>