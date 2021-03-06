<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//Request::setTrustedProxies(array('127.0.0.1'));

/*$app->get('/', function () use ($app) {

    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');*/


/*home - index*/
//$app->get('/', 'rchecnes\Controller\HomeController::show')
//    ->bind('home');

//carga por defecto
$app->get('/', 'rchecnes\Controller\NoticiaController::show')
    ->bind('home');
//servicios
 $app->get('/servicio', 'rchecnes\Controller\ServicioController::show')
    ->bind('servicio');

//portafolio personal
$app->get('/portafolio', 'rchecnes\Controller\PortafolioController::show')
    ->bind('portafolio');

//pagina de info al usuario
$app->get('/info', 'rchecnes\Controller\InfoController::show')
    ->bind('info');

//precios
$app->get('/precio', 'rchecnes\Controller\PrecioController::show')
    ->bind('precio');

//pagina de contacto
$app->get('/contacto', 'rchecnes\Controller\ContactoController::show')
    ->bind('contacto');

//contacto de prueba dos enviadno
$app->get('/contacto', 'rchecnes\Controller\ContactoController::showTwo')
    ->bind('contacto');

$app->get('/enviarmail', 'rchecnes\Controller\ContactoController::enviarMail')
    ->bind('enviarmail');

//$app->match('/sendmail', 'rchecnes\Controller\ContactoController::sendMail')
//    ->bind('sendmail');
$app->match('/sendmail', function(Request $request) use ($app) {
    
    if ($request->isMethod('POST'))
    {
            $app['mailer']->send(\Swift_Message::newInstance()
                ->setSubject("subject")
                ->setFrom(array('silex.swiftmailer@gmail.com')) // replace with your own
                ->setTo(array('silex.swiftmailer@gmail.com'))   // replace with email recipient
                ->setBody("cuerpo del mail"));

            return $app->redirect('contacto');
        
    }

})
->bind('sendmail');

//pagina de noticia
$app->get('/noticia', 'rchecnes\Controller\NoticiaController::show')
    ->bind('noticia');

//cargar grafica
$app->get('/showcomparacion', 'rchecnes\Controller\NoticiaController::showComparacion')
    ->bind('showcomparacion');

/*
generador de errores
*/
/*$app->error(function (\Exception $e, $code){
    switch ($code) {
        case 404:
            $message = 'No hemos encontrado la página solicitada.';
            break;
        default:
            $message = 'Lo sentimos pero ha sucedido un error grave.';

    }

    return new Response($message);
});*/

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
