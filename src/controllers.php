<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;


$app->get('/publicidad', function () use ($app) {

    $data['paises'] = array(
                        array('nombre'=>'Perú','codigo'=>'56454655'),
                        array('nombre'=>'Venezuela','codigo'=>'89787554'),
                        array('nombre'=>'Paraguay','codigo'=>'897898465'),
                        array('nombre'=>'EEUU','codigo'=>'7987465455')
                        );
    $data['saludos'] = "Bienvenidos a pagina de publicidad de richard";
    return $app['twig']->render('publicidad.html.twig', $data);
})
->bind('publicidad');


/*$app->get('/usuario/{user_id}', function($user_id) use ($app){
    return "Bienvenido usuario# {$user_id}";
});*/


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
