<?php

class ErrorController
{



    // --- Code "générique" / réutilisable sur un autre projet

    // Fonction d'affichage dynamique.
    public function show($view, $viewVars = [])
    {
        require __DIR__ . '/../views/header.tpl.php';
        // Inclure le template dans le résultat HTML qui sera renvoyée par le serveur.
        require __DIR__ . '/../views/' . $view . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }


    // --- Code "spécifique" / pas réutilisable sur un autre projet

    // Pour afficher la homepage.
    public function notFound()
    {
        $this->show('404');
    }

}