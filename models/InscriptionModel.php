<?php

namespace models;

use models\base\SQL;

class InscriptionModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users', 'id_user');
    }
    function createUser($user, $email, $pwd){
        $stmt = $this->pdo->prepare("INSERT INTO users(login, email, pwd) VALUES(?, ?, ?)");
        $stmt -> execute([$user, $email, $pwd]);
    }
}