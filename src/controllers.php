<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

/*
pagina de publicidad
*/
$app->get('/services', function () use ($app) {

    $data['saludos'] = "Bienvenidos a pagina de publicidad de richard";
    return $app['twig']->render('services.html.twig', $data);
})
->bind('services');

/*servicios*/
$app->get('/portafolio', function () use ($app) {

    return $app['twig']->render('portafolio.html.twig');
})
->bind('portafolio');

/*
ejecuta algo y luego redirecciona
*/

$app->get('/registrar', function () use ($app) {

    //return $app->redirect('/publicidad');
})
->bind('registrar');

/*
generador de errores
*/
$app->error(function (\Exception $e, $code) {
    switch ($code) {
        case 404:
            $message = 'No hemos encontrado la página solicitada.';
            break;
        default:
            $message = 'Lo sentimos pero ha sucedido un error grave.';
    }

    return new Response($message);
});


$app->get('/usuario', 'Loque\FuncionesController::registrar');


$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
