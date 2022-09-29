<?php

namespace models;

use models\base\SQL;

class ConnectionModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users', 'id_user');
    }

    function IsLoginExist($login)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(id_user) AS 'count' FROM users WHERE login = ?;
");
        $stmt->execute([$login]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    function getPasswordByLogin($login)
    {
        $stmt = $this->pdo->prepare("SELECT pwd FROM users WHERE login = ?;
");
        $stmt->execute([$login]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    function getInfoUser($login){
        $stmt = $this->pdo->prepare("SELECT id_user, login, pwd FROM users WHERE login = ?");
        $stmt -> execute([$login]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}