<?php

class AbstractManager
{
    protected $db;

    function __construct()
    {

        $connexion = "mysql:host=db.3wa.io;port=3306;charset=utf8;dbname=laurelineagabibrac_e-commerce";
        $this->db = new PDO(
            $connexion,
            "laurelineagabibrac",
            "c8b4d35a0077655c5f327ec2af4c0eac"
        );
    }
}

?>