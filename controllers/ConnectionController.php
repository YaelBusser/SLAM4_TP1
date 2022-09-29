<?php

namespace controllers;
use controllers\base\Web;
use models\ConnectionModel;
use utils\SessionHelpers;
use utils\Template;
class ConnectionController extends Web
{
    private $connectionModel;

    function __construct()
    {
        $this->connectionModel = new ConnectionModel();
    }
    /*
        Méthode connection qui permet de déterminer toutes les erreurs du formulaire et
        de permettre à l'utilisateur de se connecter !
    */
    function connection()
    {
        $error = "";
        if (!empty($_POST["btnConnection"])) {
            if (!empty($_POST["login"]) && !empty($_POST["pwd"])) {
                $login = htmlspecialchars($_POST["login"]);
                $pwd = htmlspecialchars($_POST["pwd"]);
                $loginExist = $this->connectionModel->IsLoginExist($login);
                if ($loginExist["count"] == 1) {
                    $pwdCorrect = $this->connectionModel->getPasswordByLogin($login);
                    if (password_verify($pwd, $pwdCorrect["pwd"])) {
                        $infosUser = $this->connectionModel->getInfoUser($login);
                        $_SESSION["user"] = $infosUser;
                        #echo $_SESSION["user"]["login"]; Cela permet de récupérer toutes les infos des users.

                        $this->redirect("/todo/list");
                    } else {
                        $error = "Le mot de passe est incorrecte !";
                    }
                } else {
                    $error = "Ce compte utilisateur n'existe pas !";
                }
            } else {
                $error = "Veuillez remplir tous les champs !";
            }
        }
        Template::render("views/connection.php", array("errorConnection" => $error)); // Affichage de votre vue
    }
    function logout(){
        SessionHelpers::logout();
        $this->redirect("/");
    }
}