<?php

require_once __DIR__ . '/vendor/autoload.php';

// 1. Create a Symfony Request
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

// 2. Bootstrap Twig
$loader = new \Twig\Loader\FilesystemLoader([
  './templates'
]);
$twig = new \Twig\Environment($loader, array(
  'cache' => false,
  'debug' => true,
  'strict_variables' => true,
));
$twig->addExtension(new \Twig\Extension\DebugExtension());

// 3. Route to pages
switch($uri) {
  case '/':
    echo $twig->render('homepage.twig', array(
      'twigVariable' => 'yay!',
    ));
};
