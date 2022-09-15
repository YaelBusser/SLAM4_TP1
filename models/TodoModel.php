<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id_todos');
    }
    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
    function ajouterTodo($text)
    {
        $rqt_add_todo = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $rqt_add_todo->execute([$text]);
    }
    function supprimerTodo($id)
    {
        $rqt_add_todo = $this->pdo->prepare("DELETE FROM todos WHERE id = ? AND termine = 1");
        $rqt_add_todo->execute([$id]);
    }
}