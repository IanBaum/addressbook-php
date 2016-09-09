<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/addressbook.php';



    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvicer(),array(
        'twig.path' => __DIR__.'/../views'
    ));
    // Home Page
    $app->get('/', function() use($app){
      return $app['twig']->render('home.html.php');
    });

    return $app;
?>
