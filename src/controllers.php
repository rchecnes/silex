<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//use rchecnes\ServicesController;
//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {

    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');

/*
pagina de servicios
*/
/*$app->get('/services', function () use ($app) {

    $data['saludos'] = "Bienvenidos a pagina de publicidad de richard";

    return $app['twig']->render('services.html.twig', $data);

})
->bind('services');*/

 $app->get('/services', 'rchecnes\ServicesController::show')
     ->bind('services');

/*portafolio personal*/
$app->get('/portafolio', function () use ($app) {

    return $app['twig']->render('portafolio.html.twig');

})
->bind('portafolio');

/*
pagina de info al usuario
*/
$app->get('/info', function () use ($app) {

    return $app['twig']->render('info.html.twig');

})
->bind('info');

/*precios*/
$app->get('/preci', function () use ($app) {

    return $app['twig']->render('preci.html.twig');

})->bind('preci');
/*
pagina de contacto
*/
$app->get('/contacto', function () use ($app) {

    return $app['twig']->render('contacto.html.twig');

})
->bind('contacto');

/*
generador de errores
*/
$app->error(function (\Exception $e, $code){
    switch ($code) {
        case 404:
            $message = 'No hemos encontrado la página solicitada.';
            break;
        default:
            $message = 'Lo sentimos pero ha sucedido un error grave.';

    }

    return new Response($message);
});

// $app->error(function (\Exception $e, $code) use ($app) {
//     switch ($code) {
//         case 404:
//             $data['mensage'] = 'No hemos encontrado la página solicitada.';
//             $pag_error       = 'errors/404.html';
//             break;
//         default:
//             $data['mensage'] = 'Lo sentimos pero ha sucedido un error grave.';
//             $pag_error       = 'errors/default.html';

//     }

//     return $app['twig']->render($pag_error,$data);
// });


//$app->get('/usuario', 'Loque\FuncionesController::registrar');


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
