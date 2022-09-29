<?php

namespace controllers;

use controllers\base\Web;
use models\TodoModel;
use utils\Template;

class TodoWeb extends Web
{
    private $todoModel;

    function __construct()
    {
        $this->todoModel = new TodoModel();
    }

    function list()
    {
        #$todos = $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        #Template::render("views/todos/list.php", array('todos' => $todos)); // Affichage de votre vue.
        $todos = $this->todoModel->getTodosByIdUser($_SESSION["user"]["id_user"]);
        Template::render("views/todos/list.php", array("todos" => $todos));
    }
    function ajouter($text = "")
    {
        $this->todoModel->ajouterTodo($text);
        $this->redirect("./list");
    }

    function terminer($id = '')
    {
        if ($id != "") {
            $this->todoModel->marquerCommeTermine($id);
        }
        $this->redirect("./list");
    }

    function supprimer($id = '')
    {
        $this->todoModel->supprimerTodo($id);
        $this->redirect("./list");
    }
}