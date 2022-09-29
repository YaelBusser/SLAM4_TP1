<?php

namespace routes;

use controllers\Account;
use controllers\ConnectionController;
use controllers\InscriptionController;
use controllers\SampleWeb;
use controllers\VideoWeb;
use controllers\TodoWeb;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();

        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);

        $todo = new TodoWeb();
        if (SessionHelpers::isLogin()) {
            Route::Add('/todo/list', [$todo, 'list']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer', [$todo, 'supprimer']);
        }
        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
        Route::Add('/sample/{id}', [$main, 'sample']);
        $connection = new ConnectionController();
        #Définition de la route qui renvoit le template et les conditions associées
        # de la méthode Connection contenue dans le controller ConnectionController
        Route::Add('/connection', [$connection, 'connection']);
        #Route qui renvoit vers la méthode de déconnexion contenue dans le controller ConnectionController
        Route::Add('/logout', [$connection, 'logout']);
        #Définition de la route qui renvoit le template et les conditions associées
        # de la méthode inscription contenue dans le controller InscriptionController
        $inscription = new InscriptionController();
        Route::Add('/inscription', [$inscription, 'inscription']);
    }
}

