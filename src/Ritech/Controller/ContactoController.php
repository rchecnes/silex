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

        $form = $app['form.factory']->createBuilder('form', $data)
            ->add('name')
            ->add('email')
            ->add('gender', 'choice', array(
                    'choices' => array(1 => 'male', 2 => 'female'),
                    'expanded' => true,
            ))
            ->getForm();

        return $app['twig']->render('view/Contacto/contacto.html.twig', $data);
    }
}