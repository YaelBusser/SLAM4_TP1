<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('', 'cle-de-votre-table');
    }
}