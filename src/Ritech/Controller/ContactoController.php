<?php;
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class ContactoController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('view/Contacto/contacto.html.twig', $data);

    }

    public function showTwo(Application $app, Request $request){

        $data['saludos'] = "Hollaaaa";

        return $app['twig']->render('view/Contacto/contactoDos.html.twig', $data);
    }

    public function enviarMail(Application $app, Request $request){

        $data['saludos'] = "holaaaa";

        return $app['twig']->render('view/Contacto/contactoDos.html.twig', $data);
    }
}