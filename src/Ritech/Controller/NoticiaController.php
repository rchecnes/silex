<?php
// archivo src/Controller.php
namespace rchecnes\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/**
*
*/
class NoticiaController
{
    public function show(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('web/Noticia/noticia.html.twig', $data);

    }

    public function showComparacion(Application $app, Request $request)
    {
        $data['saludos'] = "hola";

        return $app['twig']->render('web/noticia/graficaComparacion.html.twig', $data);

    }

}
