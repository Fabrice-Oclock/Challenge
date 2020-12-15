<?php


class MainController {

  // fonction d'affichage dynamique
  function show($view, $viewVars = []){
    require __DIR__ . '/../views/header.tpl.php';
    require __DIR__ . '/../views/' . $view  . '.tpl.php';
    require __DIR__ . '/../views/footer.tpl.php'; 
  }

  // Pour l'affichage de la homepage
  function home(){
    $this->show('index');
  }

  // Pour afficher la page des produits 
  function products(){
    $this->show('products');
  }

  // Pour afficher la page about 
  function about()
  {
    $this->show('about');
  }

  // Pour afficher la page a propos du magasin
  function store(){
    $weekOpeningHours = [
      'Sunday' => 'Closed', 
      'Monday' => '7:00 AM to 8:00 PM',
      'Tuesday' => '7:00 AM to 8:00 PM',
      'Wednesday' => '7:00 AM to 8:00 PM',
      'Thursday' => '7:00 AM to 8:00 PM',
      'Friday' => '7:00 AM to 8:00 PM',
      'Saturday' => '9:00 AM to 5:00 PM'
    ];
    // https://www.php.net/manual/fr/datetime.format.php
    // ici je récupère la date du jour
    $today = date("Y-m-d"); 
    // je la transforme en timestamp
    $today = strtotime($today);
    // Pour l'utiliser dans un avec 'N'
    $dayNumber = date('N', $today );
    // ce qui va nous renvoyer le jour de la semaine
    $dayNumber = $dayNumber == 7 ? 0 : $dayNumber;
    //$uneVariable = CONDITON ? ValeurDeLaVariableSiVRAI : ValeurDeLaVariableSiFaux;
    // https://www.php.net/manual/fr/function.array-keys.php
    // array_keys va prendre tout les nom des clés perso de mon
    // tableau associatif, et va nous fabriquer un tableau normal.
    $todayName = array_keys($weekOpeningHours)[$dayNumber];
  
    // Ok, les données sont prêtes, on les transmets à la vue ! 
  
    $viewVars['weekOpeningHours'] = $weekOpeningHours;
    $viewVars['todayName'] = $todayName ;


    $this->show('store', $viewVars);
  }


}
