<?php

namespace controllers;

use controllers\base\Web;
use models\ConnectionModel;
use models\InscriptionModel;
use utils\SessionHelpers;
use utils\Template;

class InscriptionController extends Web
{
    private $connectionModel;

    function __construct()
    {
        $this->connectionModel = new ConnectionModel();
        $this->inscriptionModel = new InscriptionModel();
    }

    function inscription()
    {
        $errorInscription = "";
        if (!empty($_POST["btnInscription"])) {
            if (!empty($_POST["loginInscription"]) && !empty($_POST["pwdInscription"]) && !empty($_POST["emailInscription"]) && !empty($_POST["pwd2Inscription"])) {
                $loginInscription = htmlspecialchars($_POST["loginInscription"]);
                $emailInscription = htmlspecialchars($_POST["emailInscription"]);
                $pwdInscription = $_POST["pwdInscription"];
                $pwd2Inscription = $_POST["pwd2Inscription"];
                $loginExistInscription = $this->connectionModel->IsLoginExist($loginInscription);
                if ($loginExistInscription["count"] == 0) {
                    if ($pwdInscription == $pwd2Inscription) {
                        $pwdInscription = password_hash($_POST["pwdInscription"], PASSWORD_DEFAULT);
                        $this->inscriptionModel->createUser($loginInscription, $emailInscription, $pwdInscription);
                        $this->redirect("/connection?creation=ok");
                    } else {
                        $errorInscription = "Vos mots de passe ne correspondent pas !";
                    }
                } else {
                    $errorInscription = "Ce compte utilisateur existe déjà !";
                }
            } else {
                $errorInscription = "Veuillez remplir tous les champs !";
            }
        }
        Template::render("views/inscription.php", array("errorInscription" => $errorInscription)); // Affichage de votre vue
    }

    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("/");
    }
}