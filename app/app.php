<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/addressbook.php';

    session_start();
    if(empty($_SESSION['list_of_contacts'])){
      $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(),array(
        'twig.path' => __DIR__.'/../views'
    ));
    // Home Page
    $app->get('/', function() use($app){
        return $app['twig']->render('home.html.twig', array('contacts'=> Contact::getAll()));
    });

    $app->post('/addcontact', function() use($app){
      $contact = new Contact($_POST['contactAddress'],$_POST['contactName'],$_POST['contactPhone']);
      $contact->save();
      return $app['twig']->render('addcontact.html.twig', array('newcontact' => $contact));
    });

    return $app;
?>
