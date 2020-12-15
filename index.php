<?php 


// Pour utiliser MainController
require __DIR__ . '/controllers/MainController.php';
require __DIR__ . '/controllers/ErrorController.php';

$routes = [

  '/' => [
    'controller' => 'MainController',
    'method' => 'home'
  ],
  '/about' => [
    'controller' => 'MainController',
    'method' => 'about'
  ],

  '/store' => [
    'controller' => 'MainController',
    'method' => 'store'
  ],

  '/products' => [
    'controller' => 'MainController',
    'method' => 'products'
  ],


    //TODO ATENTION LE CONTROLLER ErrorController n'EXISTE PAS 
  '404' => [
    'controller' => 'ErrorController',
    'method' => 'notFound'
  ]

];


// récupérer le paramètre GET de l'URL "?page="
// Il nous indique la page/vue à afficher, donc le template a utiliser
if(isset($_GET['page'])){
  $requestedPage = $_GET['page'];
} else {
  $requestedPage = '/';
}
// alternative n1
// $page = filter_input(INPUT_GET, 'page');
// alternative v2
//$page = $_GET['page'] ? $_GET['page'] : 'home';
// alternative v3
//$page = $_GET['page'] ?? 'home';



//! Etape 5 +

//Dispatcher - on determine quel "endpoint" utiliser !
// en fonction de la page demandée par l'utilisateur,
//grace au tableau de correspondances des routes



if(isset($routes[$requestedPage])){
  // on vient récupérer le nom du controller ...
$controllerName = $routes[$requestedPage]['controller'];
// et le nom de la methode a utiliser ...
$methodName = $routes[$requestedPage]['method'];
// Pour la page qui a été demandé !

// Si je demande la page home
// $controllerName va etre égal a 'MainController'
// Donc si je demande la page home, la ligne de code ci dessous
// se transformerait en $controller = new MainController();
$controller = new $controllerName();

//Pour terminer j'apelle ma methode de manière dynamique 
$controller->$methodName();

} else {
  header("HTTP/1.0 404 Not found");
  $errorController = new ErrorController();
  $methodName = $routes['404']['method'];
  $errorController->$methodName();

}







/*
// Trouver le bon nom de fichier de template, en fonction de la vue demandée.
if($requestedPage === 'store'){
  //$view = 'store';
  


  //! ON VA APELLER LA METHODE STORE DE MON OBJET CONTROLLER
  //$controller->store($viewVars);

}
else if ($requestedPage === 'products'){
 // $view = 'products';
  //$controller->products();
}
else if ($requestedPage === 'home'){
  //$view = 'index';
  //$controller->home();
} 
*/




// Fonction d'affichage dynamique
// Attention, les fonctions sont HERMETIQUES ! 
// C'est pour cela que j'ajoute un paramètre $viewVars
// qui aura pour seul but de faire passer des infos
// a une vue ! 
// Pour rappel, toute variable déclarée en DEHORS de ma fonction
// N'est pas accessible par ma fonction ! 
// pour faire passer des infos a une fonction, il faut utiliser
// les arguments ! 




//show($view, $viewVars);



//var_dump(__DIR__);
