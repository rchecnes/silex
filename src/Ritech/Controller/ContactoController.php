<?php
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

        $data = array(
            'name' => 'Your name',
            'email' => 'Your email',
        );

        $form = $app['form.factory']->createBuilder('form')
            ->add('name','text')
            ->add('email','text')
            ->getForm();

        return $app['twig']->render('view/Contacto/contactoDos.html.twig', array('form' => $form->createView()));
    }
}