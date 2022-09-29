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
        Route::Add('/connection', [$connection, 'connection']);
        Route::Add('/logout', [$connection, 'logout']);
        $inscription = new InscriptionController();
        Route::Add('/inscription', [$inscription, 'inscription']);
    }
}

