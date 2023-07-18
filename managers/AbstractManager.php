<?php

class AbstractManager
{
    protected $db;

    function __construct()
    {

        $connexion = "mysql:host=".$dbInfo["host"].";port=3306;charset=utf8;dbname=".$dbInfo["db_name"];
        $this->db = new PDO(
            $connexion,
            $dbInfo["user"],
            $dbInfo["password"]
        );
    }
}

?>